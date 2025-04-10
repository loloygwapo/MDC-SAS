<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { PaperClipIcon } from "@heroicons/vue/20/solid";
import { Head, Link } from "@inertiajs/vue3";
import dayjs from "dayjs";
import LocalizedFormat from "dayjs/plugin/localizedFormat";

dayjs.extend(LocalizedFormat);
defineProps(["scholarship"]);
</script>
<template>
    <Head title="Scholarships" />

    <AuthenticatedLayout>
        <div>
            <header class="flex items-center justify-between">
                <div class="px-4 sm:px-0">
                    <div class="items-center gap-2 sm:flex">
                        <h3
                            class="text-base font-semibold leading-7 text-gray-900"
                        >
                            {{ scholarship.scholarshipName }} Information
                        </h3>
                        <p
                            :class="
                                scholarship.scholarshipType ===
                                'government scholarship'
                                    ? 'bg-yellow-600'
                                    : 'bg-indigo-600 ' &&
                                      scholarship.scholarshipType ===
                                          'private scholarship'
                                    ? 'bg-slate-700'
                                    : 'bg-indigo-600 '
                            "
                            class="inline-block p-2 px-4 my-2 text-xs text-white capitalize rounded"
                        >
                            {{ scholarship.scholarshipType }}
                        </p>
                    </div>
                    <p class="max-w-2xl text-sm leading-6 text-gray-500">
                        Information and details about the scholarship.
                    </p>
                </div>
                <Link
                    :href="route('scholarship.index')"
                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Back
                </Link>
            </header>

            <div class="mt-6 border-t border-gray-100">
                <dl class="divide-y divide-gray-100">
                    <div
                        class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0"
                    >
                        <dt class="text-sm font-medium leading-6 text-gray-900">
                            Scholarship Name
                        </dt>
                        <dd
                            class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"
                        >
                            {{ scholarship.scholarshipName }}
                        </dd>
                    </div>
                    <div
                        class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0"
                    >
                        <dt class="text-sm font-medium leading-6 text-gray-900">
                            Managed By
                            <span class="text-xs">(Representative Name)</span>
                        </dt>
                        <dd
                            class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"
                        >
                            {{ scholarship.representative.name }}
                        </dd>
                    </div>
                    <div
                        class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0"
                    >
                        <dt class="text-sm font-medium leading-6 text-gray-900">
                            Status
                        </dt>
                        <dd
                            class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"
                        >
                            {{ scholarship.status }}
                        </dd>
                    </div>
                    <div
                        v-if="
                            scholarship.scholarshipType !==
                                'academic scholarship' &&
                            scholarship.scholarshipType !==
                                'private scholarship' &&
                            scholarship.scholarshipType !==
                                'government scholarship'
                        "
                        class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0"
                    >
                        <dt class="text-sm font-medium leading-6 text-gray-900">
                            Slot
                        </dt>
                        <dd
                            class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"
                        >
                            {{ scholarship.application_form.length }} /
                            {{ scholarship.slot }}
                        </dd>
                    </div>
                    <div
                        class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0"
                    >
                        <dt class="text-sm font-medium leading-6 text-gray-900">
                            Deadline
                        </dt>
                        <dd
                            class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"
                        >
                            {{ dayjs(scholarship.deadlineAt).format("LL") }}
                        </dd>
                    </div>
                    <div
                        v-if="scholarship.applicationLink !== null"
                        class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0"
                    >
                        <dt class="text-sm font-medium leading-6 text-gray-900">
                            Application Link
                            <span class="text-xs">(if any)</span>
                        </dt>
                        <dd
                            class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0"
                        >
                            <ul
                                role="list"
                                class="border border-gray-200 divide-y divide-gray-100 rounded-md"
                            >
                                <li
                                    class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6"
                                >
                                    <div class="flex items-center flex-1 w-0">
                                        <PaperClipIcon
                                            class="flex-shrink-0 w-5 h-5 text-gray-400"
                                            aria-hidden="true"
                                        />
                                        <div
                                            class="flex flex-1 min-w-0 gap-2 ml-4"
                                        >
                                            <span
                                                class="font-medium truncate"
                                                >{{
                                                    scholarship.applicationLink ??
                                                    "No Available Link"
                                                }}</span
                                            >
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0 ml-4">
                                        <a
                                            target="__blank"
                                            :href="scholarship.applicationLink"
                                            class="font-medium text-indigo-600 hover:text-indigo-500"
                                            >Go to link</a
                                        >
                                    </div>
                                </li>
                            </ul>
                        </dd>
                    </div>
                    <div
                        class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0"
                    >
                        <dt class="text-sm font-medium leading-6 text-gray-900">
                            Details
                        </dt>
                        <dd
                            class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"
                        >
                            {{ scholarship.details }}
                        </dd>
                    </div>
                    <div
                        v-if="
                            scholarship.requirements !== null &&
                            scholarship.requirements !== ''
                        "
                        class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0"
                    >
                        <dt class="text-sm font-medium leading-6 text-gray-900">
                            Requirements
                        </dt>
                        <dd
                            class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0"
                        >
                            <ul
                                role="list"
                                class="border border-gray-200 divide-y divide-gray-100 rounded-md"
                            >
                               <li
                                    v-for="(requirement, index) in (scholarship.requirements ?? '').split('|')"
                                    :key="index"
                                    class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6"
                                    >
                                    {{ requirement }}

                                    <div class="flex items-center flex-1 w-0">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="flex-shrink-0 w-5 h-5 text-gray-400"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z"
                                            />
                                        </svg>

                                        <div
                                            class="flex flex-1 min-w-0 gap-2 ml-4"
                                        >
                                            <span
                                                class="font-medium truncate"
                                                >{{ requirement }}</span
                                            >
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
