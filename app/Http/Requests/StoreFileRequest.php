<?php

namespace App\Http\Requests;

use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreFileRequest extends ParentIdBaseRequest
{
    
    protected function prepareForValidation()
    {
        $paths=array_filter($this->relative_paths ?? [], fn($f)=> $f != null);

        $this->merge([
            'file_paths'=> $paths,
            'folder_name'=> $this->detectFolderName($paths)
        ]);
    }
    protected function passedValidation()
    {
        $data = $this->validated();
        try{ 
        $this->replace([
            'file_tree' => $this->buildFileTree($this->file_paths, $data['files'])
        ]);
        }catch(Exception $e){
            return redirect()->back();
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        
        return array_merge(parent::rules(), [ 
            'files.*' => [
                'required',
                'file',
                function($attributes, $value, $fail)
                {

                    if(!$this->folder_name)
                    { 
                        /** @var $value \Illuminate\http\UploadedFile */
                        $file=File::query()->where('name', $value->getClientOriginalName())
                        ->where('created_by', Auth::id())
                        ->where('parent_id', $this->parent_id)
                        ->whereNull('deleted_at')
                        ->exists();

                        if($file)
                        {
                            $fail('File "'. $value->getClientOriginalName(). '"already exists.');
                        }
                    }
                }
            ],
            'folder_name' => [
                'nullable',
                'string',
                function($attributes, $value, $fail){
                    if($value)
                    { 
                        /** @var $value \Illuminate\http\UploadedFile */
                        $file=File::query()->where('name', $value)
                        ->where('created_by', Auth::id())
                        ->where('parent_id', $this->parent_id)
                        ->whereNull('deleted_at')
                        ->exists();

                        if($file)
                        {
                            $fail('Folder "'. $value. '"already exists.');
                        }
                    }
                }

                
            ]
        ]);
    }

    public function detectFolderName($paths)
    {
       
        if(!$paths){
            return null;
        }
        $parts = explode("/", $paths[0]);
        return $parts[0];
    }
    private function buildFileTree( $filePaths, $files)
    {
        $filePaths = array_slice($filePaths, 0, count($files));
        $filePaths= array_filter($filePaths, fn($f) => $f!= null);

        $tree = [];
        /**
         * [
         * ecommerce =>[
         *          test=> [
         *                  1.jpg => uploadfile    
         *          ]
         *      ]
         * ]
         * 
         * that is our structure of the tree's files
         */

         foreach($filePaths as $ind => $filePath)
         {
            $parts = explode('/', $filePath); // ecommerce, test, 1.jpg

            $currrentNode = &$tree;
            foreach($parts as $i => $part){
                if(!isset($currrentNode[$part])){
                    $currrentNode[$part] = [];
                }
                if($i === count($parts) - 1 ){
                    $currrentNode[$part] = $files[$ind];
                }else{
                    $currrentNode = &$currrentNode[$part];
                }
            }
         }

         return $tree;
    }
}
