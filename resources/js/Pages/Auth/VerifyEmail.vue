<script setup>
import { computed } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    status: {
        type: String,
    },
});

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(() => props.status === 'verification-link-sent');
</script>

<template>
    <GuestLayout>
        <Head title="Email Verification" />

        <div class="mb-4 text-sm text-gray-600">
            Merci pour l'enregistrement! Avant de commencer, pourriez-vous vérifier votre adresse e-mail en cliquant sur le lien
            nous venons de vous envoyer un e-mail ? Si vous n'avez pas reçu l'e-mail, nous vous en enverrons volontiers un autre.
        </div>

        <div class="mb-4 font-medium text-sm text-green-600" v-if="verificationLinkSent">
            
            Un nouveau lien de vérification a été envoyé à l'adresse e-mail que vous avez fournie lors de l'inscription.    
        </div>

        <form @submit.prevent="submit">
            <div class="mt-4 flex items-center justify-between">
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Renvoyer l'e-mail de vérification
                </PrimaryButton>

                <Link
                    :href="route('logout')"
                    method="post"
                    as="button"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >Se déconnecter</Link
                >
            </div>
        </form>
    </GuestLayout>
</template>
