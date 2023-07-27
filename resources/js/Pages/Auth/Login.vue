<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import AuthenticationCard from "@/Components/AuthenticationCard.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import Button from "primevue/button";
import InputText from "primevue/inputtext";

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.transform((data) => ({
        ...data,
        remember: form.remember ? "on" : "",
    })).post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <Head title="Log in" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <div class="w-full">
            <h2 class="text-3xl font-serif text-center">
                PROYECTOS DE SOFTWARE II
            </h2>
        </div>

        <div
            v-if="status"
            class="mb-4 font-medium text-sm text-green-600 dark:text-green-400"
        >
            {{ status }}
        </div>
        <div class="flex justify-between gap-3 flex-col md:flex-row">
            <a href="/auth/facebook" class="flex-1">
                <Button
                    label="Facebook"
                    icon="pi pi-facebook"
                    icon-class="text-blue-500"
                    outlined
                    class="w-full"
                />
            </a>
            <a href="/login-google" class="flex-1">
                <Button
                    label="Google"
                    icon="pi pi-google"
                    icon-class="text-transparent bg-clip-text bg-gradient-to-r from-red-500 via-yellow-500 to-blue-500 "
                    outlined
                    class="w-full"
                />
            </a>
        </div>

        <div
            class="my-1 md:my-4 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-neutral-300 after:mt-0.5 after:flex-1 after:border-t after:border-neutral-300"
        >
            <p
                class="mx-4 mb-0 text-center font-semibold dark:text-neutral-900"
            >
                OR
            </p>
        </div>

        <form @submit.prevent="submit">
            <div class="flex flex-col gap-8">
                <div class="flex flex-col gap-7">
                    <span class="p-float-label w-full">
                        <InputText
                            id="email"
                            v-model="form.email"
                            class="w-full"
                            type="email"
                            required
                            autocomplete="username"
                        />
                        <label for="email">Email</label>
                    </span>
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="flex flex-col gap-7">
                    <span class="p-float-label w-full">
                        <InputText
                            id="password"
                            v-model="form.password"
                            class="w-full"
                            type="password"
                            required
                            autocomplete="current-password"
                        />
                        <label for="password">Password</label>
                    </span>
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="flex flex-col gap-7">
                    <div class="flex justify-between">
                        <div class="block">
                            <label class="flex items-center">
                                <Checkbox
                                    v-model:checked="form.remember"
                                    name="remember"
                                />
                                <span class="ml-2 text-sm text-gray-600"
                                    >Remember me</span
                                >
                            </label>
                        </div>
                        <Link
                            v-if="canResetPassword"
                            :href="route('password.request')"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            Forgot your password?
                        </Link>
                    </div>
                    <div class="flex flex-col gap-2">
                        <!-- <PrimaryButton class="w-full inline-block pt-2 pr-5 pb-2 pl-5 text-xl font-medium text-center text-white bg-indigo-500 rounded-lg transition duration-200 hover:bg-indigo-600 ease" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Log in
                        </PrimaryButton> -->
                        <Button
                            label="Log in"
                            severity="info"
                            type="submit"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        />
                        <!-- Divider -->
                    </div>
                </div>
            </div>
        </form>
        <svg
            viewbox="0 0 91 91"
            class="absolute top-0 left-0 -z-10 w-32 h-32 -mt-5 -ml-5 text-yellow-300 fill-current"
        >
            <g stroke="none" strokewidth="1" fillrule="evenodd">
                <g fillrule="nonzero">
                    <g>
                        <g>
                            <circle cx="3.261" cy="3.445" r="2.72" />
                            <circle cx="15.296" cy="3.445" r="2.719" />
                            <circle cx="27.333" cy="3.445" r="2.72" />
                            <circle cx="39.369" cy="3.445" r="2.72" />
                            <circle cx="51.405" cy="3.445" r="2.72" />
                            <circle cx="63.441" cy="3.445" r="2.72" />
                            <circle cx="75.479" cy="3.445" r="2.72" />
                            <circle cx="87.514" cy="3.445" r="2.719" />
                        </g>
                        <g transform="translate(0 12)">
                            <circle cx="3.261" cy="3.525" r="2.72" />
                            <circle cx="15.296" cy="3.525" r="2.719" />
                            <circle cx="27.333" cy="3.525" r="2.72" />
                            <circle cx="39.369" cy="3.525" r="2.72" />
                            <circle cx="51.405" cy="3.525" r="2.72" />
                            <circle cx="63.441" cy="3.525" r="2.72" />
                            <circle cx="75.479" cy="3.525" r="2.72" />
                            <circle cx="87.514" cy="3.525" r="2.719" />
                        </g>
                        <g transform="translate(0 24)">
                            <circle cx="3.261" cy="3.605" r="2.72" />
                            <circle cx="15.296" cy="3.605" r="2.719" />
                            <circle cx="27.333" cy="3.605" r="2.72" />
                            <circle cx="39.369" cy="3.605" r="2.72" />
                            <circle cx="51.405" cy="3.605" r="2.72" />
                            <circle cx="63.441" cy="3.605" r="2.72" />
                            <circle cx="75.479" cy="3.605" r="2.72" />
                            <circle cx="87.514" cy="3.605" r="2.719" />
                        </g>
                        <g transform="translate(0 36)">
                            <circle cx="3.261" cy="3.686" r="2.72" />
                            <circle cx="15.296" cy="3.686" r="2.719" />
                            <circle cx="27.333" cy="3.686" r="2.72" />
                            <circle cx="39.369" cy="3.686" r="2.72" />
                            <circle cx="51.405" cy="3.686" r="2.72" />
                            <circle cx="63.441" cy="3.686" r="2.72" />
                            <circle cx="75.479" cy="3.686" r="2.72" />
                            <circle cx="87.514" cy="3.686" r="2.719" />
                        </g>
                        <g transform="translate(0 49)">
                            <circle cx="3.261" cy="2.767" r="2.72" />
                            <circle cx="15.296" cy="2.767" r="2.719" />
                            <circle cx="27.333" cy="2.767" r="2.72" />
                            <circle cx="39.369" cy="2.767" r="2.72" />
                            <circle cx="51.405" cy="2.767" r="2.72" />
                            <circle cx="63.441" cy="2.767" r="2.72" />
                            <circle cx="75.479" cy="2.767" r="2.72" />
                            <circle cx="87.514" cy="2.767" r="2.719" />
                        </g>
                        <g transform="translate(0 61)">
                            <circle cx="3.261" cy="2.846" r="2.72" />
                            <circle cx="15.296" cy="2.846" r="2.719" />
                            <circle cx="27.333" cy="2.846" r="2.72" />
                            <circle cx="39.369" cy="2.846" r="2.72" />
                            <circle cx="51.405" cy="2.846" r="2.72" />
                            <circle cx="63.441" cy="2.846" r="2.72" />
                            <circle cx="75.479" cy="2.846" r="2.72" />
                            <circle cx="87.514" cy="2.846" r="2.719" />
                        </g>
                        <g transform="translate(0 73)">
                            <circle cx="3.261" cy="2.926" r="2.72" />
                            <circle cx="15.296" cy="2.926" r="2.719" />
                            <circle cx="27.333" cy="2.926" r="2.72" />
                            <circle cx="39.369" cy="2.926" r="2.72" />
                            <circle cx="51.405" cy="2.926" r="2.72" />
                            <circle cx="63.441" cy="2.926" r="2.72" />
                            <circle cx="75.479" cy="2.926" r="2.72" />
                            <circle cx="87.514" cy="2.926" r="2.719" />
                        </g>
                        <g transform="translate(0 85)">
                            <circle cx="3.261" cy="3.006" r="2.72" />
                            <circle cx="15.296" cy="3.006" r="2.719" />
                            <circle cx="27.333" cy="3.006" r="2.72" />
                            <circle cx="39.369" cy="3.006" r="2.72" />
                            <circle cx="51.405" cy="3.006" r="2.72" />
                            <circle cx="63.441" cy="3.006" r="2.72" />
                            <circle cx="75.479" cy="3.006" r="2.72" />
                            <circle cx="87.514" cy="3.006" r="2.719" />
                        </g>
                    </g>
                </g>
            </g>
        </svg>

        <svg
            viewbox="0 0 91 91"
            class="absolute bottom-0 right-0 -z-10 w-32 h-32 -mb-14 -mr-14 text-indigo-500 fill-current"
        >
            <g stroke="none" strokewidth="1" fillrule="evenodd">
                <g fillrule="nonzero">
                    <g>
                        <g>
                            <circle cx="3.261" cy="3.445" r="2.72" />
                            <circle cx="15.296" cy="3.445" r="2.719" />
                            <circle cx="27.333" cy="3.445" r="2.72" />
                            <circle cx="39.369" cy="3.445" r="2.72" />
                            <circle cx="51.405" cy="3.445" r="2.72" />
                            <circle cx="63.441" cy="3.445" r="2.72" />
                            <circle cx="75.479" cy="3.445" r="2.72" />
                            <circle cx="87.514" cy="3.445" r="2.719" />
                        </g>
                        <g transform="translate(0 12)">
                            <circle cx="3.261" cy="3.525" r="2.72" />
                            <circle cx="15.296" cy="3.525" r="2.719" />
                            <circle cx="27.333" cy="3.525" r="2.72" />
                            <circle cx="39.369" cy="3.525" r="2.72" />
                            <circle cx="51.405" cy="3.525" r="2.72" />
                            <circle cx="63.441" cy="3.525" r="2.72" />
                            <circle cx="75.479" cy="3.525" r="2.72" />
                            <circle cx="87.514" cy="3.525" r="2.719" />
                        </g>
                        <g transform="translate(0 24)">
                            <circle cx="3.261" cy="3.605" r="2.72" />
                            <circle cx="15.296" cy="3.605" r="2.719" />
                            <circle cx="27.333" cy="3.605" r="2.72" />
                            <circle cx="39.369" cy="3.605" r="2.72" />
                            <circle cx="51.405" cy="3.605" r="2.72" />
                            <circle cx="63.441" cy="3.605" r="2.72" />
                            <circle cx="75.479" cy="3.605" r="2.72" />
                            <circle cx="87.514" cy="3.605" r="2.719" />
                        </g>
                        <g transform="translate(0 36)">
                            <circle cx="3.261" cy="3.686" r="2.72" />
                            <circle cx="15.296" cy="3.686" r="2.719" />
                            <circle cx="27.333" cy="3.686" r="2.72" />
                            <circle cx="39.369" cy="3.686" r="2.72" />
                            <circle cx="51.405" cy="3.686" r="2.72" />
                            <circle cx="63.441" cy="3.686" r="2.72" />
                            <circle cx="75.479" cy="3.686" r="2.72" />
                            <circle cx="87.514" cy="3.686" r="2.719" />
                        </g>
                        <g transform="translate(0 49)">
                            <circle cx="3.261" cy="2.767" r="2.72" />
                            <circle cx="15.296" cy="2.767" r="2.719" />
                            <circle cx="27.333" cy="2.767" r="2.72" />
                            <circle cx="39.369" cy="2.767" r="2.72" />
                            <circle cx="51.405" cy="2.767" r="2.72" />
                            <circle cx="63.441" cy="2.767" r="2.72" />
                            <circle cx="75.479" cy="2.767" r="2.72" />
                            <circle cx="87.514" cy="2.767" r="2.719" />
                        </g>
                        <g transform="translate(0 61)">
                            <circle cx="3.261" cy="2.846" r="2.72" />
                            <circle cx="15.296" cy="2.846" r="2.719" />
                            <circle cx="27.333" cy="2.846" r="2.72" />
                            <circle cx="39.369" cy="2.846" r="2.72" />
                            <circle cx="51.405" cy="2.846" r="2.72" />
                            <circle cx="63.441" cy="2.846" r="2.72" />
                            <circle cx="75.479" cy="2.846" r="2.72" />
                            <circle cx="87.514" cy="2.846" r="2.719" />
                        </g>
                        <g transform="translate(0 73)">
                            <circle cx="3.261" cy="2.926" r="2.72" />
                            <circle cx="15.296" cy="2.926" r="2.719" />
                            <circle cx="27.333" cy="2.926" r="2.72" />
                            <circle cx="39.369" cy="2.926" r="2.72" />
                            <circle cx="51.405" cy="2.926" r="2.72" />
                            <circle cx="63.441" cy="2.926" r="2.72" />
                            <circle cx="75.479" cy="2.926" r="2.72" />
                            <circle cx="87.514" cy="2.926" r="2.719" />
                        </g>
                        <g transform="translate(0 85)">
                            <circle cx="3.261" cy="3.006" r="2.72" />
                            <circle cx="15.296" cy="3.006" r="2.719" />
                            <circle cx="27.333" cy="3.006" r="2.72" />
                            <circle cx="39.369" cy="3.006" r="2.72" />
                            <circle cx="51.405" cy="3.006" r="2.72" />
                            <circle cx="63.441" cy="3.006" r="2.72" />
                            <circle cx="75.479" cy="3.006" r="2.72" />
                            <circle cx="87.514" cy="3.006" r="2.719" />
                        </g>
                    </g>
                </g>
            </g>
        </svg>
    </AuthenticationCard>
</template>

<script>
export default {
    components: {
        Button,
        InputText,
    },
};
</script>
