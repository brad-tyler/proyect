<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import AuthenticationCard from "@/Components/AuthenticationCard.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputText from "primevue/inputtext";
import Button from "primevue/button";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
    terms: false,
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <Head title="Register" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <div class="w-full">
            <h2 class="text-3xl font-serif">PROYECTOS DE SOFTWARE II</h2>
        </div>

        <div
            v-if="status"
            class="mb-4 font-medium text-sm text-green-600 dark:text-green-400"
        >
            {{ status }}
        </div>

        <form @submit.prevent="submit" class="flex flex-col gap-7">
            <div>
                <span class="p-float-label w-full">
                    <InputText
                        id="name"
                        v-model="form.name"
                        class="w-full"
                        type="text"
                        required
                        autocomplete="name"
                    />
                    <label for="name">Name</label>
                </span>
                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="">
                <span class="p-float-label w-full">
                    <InputText
                        id="email"
                        v-model="form.email"
                        class="w-full"
                        type="email"
                        required
                        autocomplete="username"
                    />
                    <label for="name">Email</label>
                </span>
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="">
                <span class="p-float-label w-full">
                    <InputText
                        id="password"
                        v-model="form.password"
                        class="w-full"
                        type="password"
                        required
                        autocomplete="new-password"
                    />
                    <label for="password">Password</label>
                </span>
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="">
                <span class="p-float-label w-full">
                    <InputText
                        id="password_confirmation"
                        v-model="form.password_confirmation"
                        class="w-full"
                        type="password"
                        required
                        autocomplete="new-password"
                    />
                    <label for="password_confirmation">Confirm Password</label>
                </span>
                <InputError
                    class="mt-2"
                    :message="form.errors.password_confirmation"
                />
            </div>

            <div
                v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature"
                class="mt-4"
            >
                <InputLabel for="terms">
                    <div class="flex items-center">
                        <Checkbox
                            id="terms"
                            v-model:checked="form.terms"
                            name="terms"
                            required
                        />

                        <div class="ml-2">
                            I agree to the
                            <a
                                target="_blank"
                                :href="route('terms.show')"
                                class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                >Terms of Service</a
                            >
                            and
                            <a
                                target="_blank"
                                :href="route('policy.show')"
                                class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                >Privacy Policy</a
                            >
                        </div>
                    </div>
                    <InputError class="mt-2" :message="form.errors.terms" />
                </InputLabel>
            </div>

            <div class="flex flex-col gap-5">
                <div class="flex justify-start">
                    <Link
                        :href="route('login')"
                        class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    >
                        Already registered?
                    </Link>
                </div>

                <Button
                    label="Register"
                    severity="info"
                    type="submit"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                />
            </div>
        </form>
    </AuthenticationCard>
</template>

<script>
export default {
    components: {
        InputText,
        Button,
    },
};
</script>
