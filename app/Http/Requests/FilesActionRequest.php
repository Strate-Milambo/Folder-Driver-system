<?php

namespace App\Http\Requests;

use App\Models\File;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use NormanHuth\VirusTotal\VirusTotal;
use Illuminate\Foundation\Http\FormRequest;


class FilesActionRequest extends ParentIdBaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'all' => 'nullable|bool',
            'ids.*' => [
                Rule::exists('files', 'id'),

                function ($attribute, $id, $fail) {
                    $file = File::query()
                        ->leftJoin('file_shares', 'file_shares.file_id', 'files.id')
                        ->where('files.id', $id)
                        ->where(function ($query) {
                            /** @var $query \Illuminate\Database\Query\Builder */
                            $query->where('files.created_by', Auth::id())
                                ->orWhere('files.parent_id', Auth::id());
                        })->firstOrfail();
                        
                    if (!$file) {
                        $fail('Invalid ID "' . $id . '"');
                    }
                }
            ]
        ]);
    }
}