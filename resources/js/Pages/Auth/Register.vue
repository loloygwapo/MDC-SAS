<script setup>
import Header from "@/Shared/Auth/Header.vue";
import Footer from "@/Shared/Auth/Footer.vue";
import RegisterLayout from "@/Layouts/RegisterLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { computed, watch } from "vue";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
    id_number: "",
    number_of_studying_siblings: "",
    monthly_income: "",
    address: "",
    year_level: "",
    birthday: "",
    have_existing_scholarship: {
        TDP: "TDP",
        TES: "TES",
        ACSP: "ACSP",
        DOLE: "DOLE",
        VIRGINIAN_SCHOLARSHIP: "VIRGINIAN_SCHOLARSHIP",
        SM_MEGAWORLD: "SM_MEGAWORLD",
        others: "",
    },
    othersInput: "",
    age: "",
});

const submit = () => {
    form.post(route("register"), {
        calculatedAge: calculatedAge.value,
        monthly_income: form.monthly_income,
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};

const calculatedAge = computed(() => {
    if (form.birthday) {
        const today = new Date();
        const birthDate = new Date(form.birthday);
        let age = today.getFullYear() - birthDate.getFullYear();

        // Check if the birthday hasn't occurred yet this year
        if (
            today.getMonth() < birthDate.getMonth() ||
            (today.getMonth() === birthDate.getMonth() &&
                today.getDate() < birthDate.getDate())
        ) {
            age--;
        }
        // Update form.age
        form.age = age.toString();
        return age.toString();
    }

    return "";
});

watch(
    () => form.birthday,
    () => {
        calculatedAge.value;
    }
);
</script>

<template>
    <Head title="Register" />
    <RegisterLayout>
        <div class="flex flex-col items-center justify-center min-h-screen sm:justify-center ">
            <div class="w-full sm:mx-auto sm:max-w-5xl">
                <div class="overflow-hidden rounded-xl">
                    <div class="px-6 py-8 sm:p-10">
                        <div class="text-center">
                            <h1 class="text-2xl font-bold text-gray-900">Create Your Account</h1>
                            <p class="mt-2 text-gray-600">
                                Please use a permanent email address where you can receive important notifications.
                            </p>
                        </div>

                        <form @submit.prevent="submit" class="mt-8">
                            <!-- Personal Information Section -->
                            <div class="mb-8">
                                <h2 class="mb-4 text-lg font-medium text-gray-900">Personal Information</h2>
                                <div class="grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6">
                                    <div class="sm:col-span-3">
                                        <InputLabel for="name" value="Full Name" class="block text-sm font-medium text-gray-700" />
                                        <TextInput
                                            id="name"
                                            type="text"
                                            class="block w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                            v-model="form.name"
                                            required
                                            autofocus
                                            autocomplete="name"
                                            placeholder="Enter your full name"
                                        />
                                        <InputError class="mt-2" :message="form.errors.name" />
                                    </div>

                                    <div class="sm:col-span-3">
                                        <InputLabel for="email" value="Email Address" class="block text-sm font-medium text-gray-700" />
                                        <TextInput
                                            id="email"
                                            type="email"
                                            class="block w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                            v-model="form.email"
                                            required
                                            autocomplete="username"
                                            placeholder="valid.email@gmail.com"
                                        />
                                        <InputError class="mt-2" :message="form.errors.email" />
                                    </div>

                                    <div class="sm:col-span-3">
                                        <InputLabel for="id_number" value="ID Number" class="block text-sm font-medium text-gray-700" />
                                        <TextInput
                                            id="id_number"
                                            type="text"
                                            class="block w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                            v-model="form.id_number"
                                            required
                                            autocomplete="id_number"
                                            placeholder="Enter your ID number"
                                        />
                                        <InputError class="mt-2" :message="form.errors.id_number" />
                                    </div>

                                    <div class="sm:col-span-3">
                                        <InputLabel for="address" value="Address" class="block text-sm font-medium text-gray-700" />
                                        <TextInput
                                            id="address"
                                            type="text"
                                            class="block w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                            v-model="form.address"
                                            required
                                            autocomplete="address"
                                            placeholder="Your complete address"
                                        />
                                        <InputError class="mt-2" :message="form.errors.address" />
                                    </div>

                                    <div class="sm:col-span-2">
                                        <InputLabel for="birthday" value="Birthday" class="block text-sm font-medium text-gray-700" />
                                        <TextInput
                                            id="birthday"
                                            type="date"
                                            class="block w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                            v-model="form.birthday"
                                            required
                                            autocomplete="birthday"
                                        />
                                        <InputError class="mt-2" :message="form.errors.birthday" />
                                    </div>

                                    <div class="sm:col-span-1">
                                        <InputLabel for="age" value="Age" class="block text-sm font-medium text-gray-700" />
                                        <TextInput
                                            id="age"
                                            type="text"
                                            class="block w-full mt-1 border-gray-300 rounded-lg shadow-sm bg-gray-50 focus:ring-indigo-500 focus:border-indigo-500"
                                            v-model="form.age"
                                            required
                                            autocomplete="age"
                                            readonly
                                        />
                                        <InputError class="mt-2" :message="form.errors.age" />
                                    </div>

                                    <div class="sm:col-span-3">
                                        <InputLabel for="year_level" value="Year Level" class="block text-sm font-medium text-gray-700" />
                                        <TextInput
                                            id="year_level"
                                            type="text"
                                            class="block w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                            v-model="form.year_level"
                                            required
                                            autocomplete="year_level"
                                            placeholder="Your current year level"
                                        />
                                        <InputError class="mt-2" :message="form.errors.year_level" />
                                    </div>
                                </div>
                            </div>

                            <!-- Financial Information Section -->
                            <div class="pt-6 mb-8 border-t border-gray-200">
                                <h2 class="mb-4 text-lg font-medium text-gray-900">Financial Information</h2>
                                <div class="grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6">
                                    <div class="sm:col-span-3">
                                        <InputLabel for="number_of_studying_siblings" value="Number of Studying Siblings" class="block text-sm font-medium text-gray-700" />
                                        <TextInput
                                            id="number_of_studying_siblings"
                                            type="number"
                                            class="block w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                            v-model="form.number_of_studying_siblings"
                                            required
                                            autocomplete="number_of_studying_siblings"
                                            placeholder="0"
                                            min="0"
                                        />
                                        <InputError class="mt-2" :message="form.errors.number_of_studying_siblings" />
                                    </div>

                                    <div class="sm:col-span-3">
                                        <InputLabel for="monthly_income" value="Monthly Income of Parents" class="block text-sm font-medium text-gray-700" />
                                        <select
                                            class="block w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                            name="monthly_income"
                                            id="monthly_income"
                                            v-model="form.monthly_income"
                                        >
                                            <option selected value="9000">9,100 or lower/month</option>
                                            <option value="9100">9,100 to 18,200/month</option>
                                            <option value="18200">18,200 to 36,400/month</option>
                                            <option value="36400">36,400 to 63,700/month</option>
                                            <option value="63700">63,700 to 109,200/month</option>
                                            <option value="109200">109,200 to 182,000/month</option>
                                            <option value="182000">Above 182,000/month</option>
                                        </select>
                                        <InputError class="mt-2" :message="form.errors.monthly_income" />
                                    </div>
                                </div>
                            </div>

                            <!-- Scholarship Information Section -->
                            <div class="pt-6 mb-8 border-t border-gray-200">
                                <h2 class="mb-4 text-lg font-medium text-gray-900">Scholarship Information</h2>
                                <div>
                                    <InputLabel for="have_existing_scholarship" value="Do you have any existing scholarships?" class="block mb-3 text-sm font-medium text-gray-700" />

                                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                                        <div v-for="(value, key) in form.have_existing_scholarship" :key="key" class="relative">
                                            <div class="flex items-start">
                                                <div class="flex items-center h-6">
                                                    <input
                                                        :id="key"
                                                        :name="key"
                                                        type="checkbox"
                                                        class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                                                        v-model="form.have_existing_scholarship[key]"
                                                    />
                                                </div>
                                                <div class="ml-3 text-sm">
                                                    <label :for="key" class="font-medium text-gray-700 capitalize">
                                                        {{ key.replace(/_/g, " ") }}
                                                    </label>
                                                </div>
                                            </div>
                                            <div v-if="key === 'others' && form.have_existing_scholarship.others" class="mt-2 ml-7">
                                                <TextInput
                                                    v-model="form.othersInput"
                                                    type="text"
                                                    :id="'othersInput'"
                                                    :name="'have_existing_scholarship_others'"
                                                    class="w-[32rem] border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                                    placeholder="Please specify"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Account Information Section -->
                            <div class="pt-6 border-t border-gray-200">
                                <h2 class="mb-4 text-lg font-medium text-gray-900">Account Security</h2>
                                <div class="grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6">
                                    <div class="sm:col-span-3">
                                        <InputLabel for="password" value="Password" class="block text-sm font-medium text-gray-700" />
                                        <TextInput
                                            id="password"
                                            type="password"
                                            class="block w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                            v-model="form.password"
                                            required
                                            autocomplete="new-password"
                                            placeholder="••••••••"
                                        />
                                        <InputError class="mt-2" :message="form.errors.password" />
                                    </div>

                                    <div class="sm:col-span-3">
                                        <InputLabel for="password_confirmation" value="Confirm Password" class="block text-sm font-medium text-gray-700" />
                                        <TextInput
                                            id="password_confirmation"
                                            type="password"
                                            class="block w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                            v-model="form.password_confirmation"
                                            required
                                            autocomplete="new-password"
                                            placeholder="••••••••"
                                        />
                                        <InputError class="mt-2" :message="form.errors.password_confirmation" />
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col items-center justify-between pt-6 mt-10 border-t border-gray-200 sm:flex-row">
                                <Link
                                    :href="route('login')"
                                    class="mb-4 text-indigo-600 transition duration-150 ease-in-out sm:mb-0 hover:text-indigo-800"
                                >
                                    Already have an account? Log in
                                </Link>

                                <PrimaryButton
                                    class="w-full px-8 py-3 font-medium text-white transition duration-150 ease-in-out bg-indigo-600 rounded-lg sm:w-auto hover:bg-indigo-700"
                                    :class="{ 'opacity-50 cursor-not-allowed': form.processing }"
                                    :disabled="form.processing"
                                >
                                    <span v-if="form.processing">Registering...</span>
                                    <span v-else>Create Account</span>
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </RegisterLayout>
</template>
Sent


