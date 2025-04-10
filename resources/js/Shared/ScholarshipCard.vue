<script setup>
const props = defineProps(["scholarships", "filteredScholarships"]);

import { Link, usePage } from "@inertiajs/vue3";
import dayjs from "dayjs";
import LocalizedFormat from "dayjs/plugin/localizedFormat";
import ButtonLinkPrivate from "./ButtonLinkPrivate.vue";
import { computed } from "vue";
dayjs.extend(LocalizedFormat);

const filterString = (str) => str.replace(/ /g, "_").toUpperCase();
const filteredRecommendations = computed(() =>
    props.scholarships.filter(
        (scholarship) =>
            !props.filteredScholarships?.includes(
                filterString(scholarship.scholarshipName)
            )
    )
);
</script>

<template>
    <template
        v-for="scholarship in filteredRecommendations"
        :key="scholarship.id"
    >
        <div
            v-if="
                !filteredScholarships?.includes(
                    filterString(scholarship.scholarshipName)
                )
            "
            class="flex flex-col mb-5 bg-white shadow-xl rounded-2xl"
            :class="
                scholarship.status === 'onHold' && 'border-yellow-700 border-4'
            "
        >
            <div class="relative flex-1 px-6 pt-16 pb-4 md:px-8">
                <div
                    v-if="scholarship.status === 'onHold'"
                    class="absolute inline px-4 py-2 text-sm text-white bg-yellow-500 rounded sm:text-base top-4 right-4"
                >
                    ON HOLD
                </div>
                <div
                    class="absolute top-0 inline-block p-4 transform -translate-y-1/2 bg-indigo-600 shadow-lg rounded-xl"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-6 h-6 text-white"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"
                        />
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 sm:text-xl">
                    {{ scholarship.scholarshipName }}
                </h3>
                <p
                    :class="
                        scholarship.scholarshipType === 'government scholarship'
                            ? 'bg-yellow-600 sm:text-base text-sm'
                            : 'bg-indigo-600  sm:text-base text-sm' &&
                                scholarship.scholarshipType ===
                                'private scholarship'
                            ? 'bg-slate-700 sm:text-base text-sm'
                            : 'bg-indigo-600  sm:text-base text-sm'
                    "
                    class="inline-block p-1 px-4 my-2 text-sm text-white capitalize rounded"
                >
                    {{ scholarship.scholarshipType }}
                </p>
                <p class="text-sm">
                    (SY)
                    {{
                        dayjs(scholarship.school_year.start_school_year).year()
                    }}
                    to
                    {{ dayjs(scholarship.school_year.end_school_year).year() }}
                </p>
                <p class="mt-3 mb-2 text-base text-gray-500 line-clamp-3">
                    {{ scholarship.details }}
                </p>
                <a
                    href="#"
                    class="text-sm font-medium text-indigo-700 sm:text-base hover:text-indigo-600"
                >
                    More Details <span aria-hidden="true"> &rarr;</span>
                </a>

                <div class="mt-2">
                    <p
                        v-if="
                            scholarship.scholarshipType !==
                                'academic scholarship' &&
                            scholarship.scholarshipType !==
                                'private scholarship' &&
                            scholarship.scholarshipType !==
                                'government scholarship'
                        "
                    >
                        Slots: {{ scholarship.application_form.length }} /
                        {{ scholarship.slot }}
                    </p>
                    <p class="text-sm sm:text-base">
                        Available For: {{ scholarship.availableFor }}
                    </p>
                    <p class="text-sm sm:text-base">
                        Deadline:
                        {{ dayjs(scholarship.deadlineAt).format("LL") }}
                    </p>
                </div>
            </div>
            <div
                class="p-6 pt-0 bg-gray-50 rounded-bl-2xl rounded-br-2xl md:px-8"
            >
                <!--                 <button
                    v-if="
                        scholarship.slot <=
                            scholarship.application_form.length &&
                        scholarship.scholarshipType === 'government scholarship'
                    "
                    type="button"
                    class="inline-flex items-center px-6 py-2 text-sm font-medium leading-4 text-white bg-red-600 border border-transparent rounded-md shadow-sm cursor-not-allowed sm:py-3 sm:text-base hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                >
                    Full
                </button> -->
                <button
                    v-if="scholarship.status === 'onHold'"
                    type="button"
                    class="inline-flex items-center px-6 py-2 text-sm font-medium leading-4 text-white border border-transparent rounded-md shadow-sm cursor-not-allowed sm:py-3 sm:text-base bg-slate-600 hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500"
                >
                    On Hold
                </button>
                <Link
                    :href="
                        route('application-form', {
                            id: scholarship.id,
                        })
                    "
                    v-else-if="
                        scholarship.scholarshipType !== 'private scholarship' &&
                        scholarship.scholarshipType !== 'academic scholarship'
                    "
                    class="inline-flex items-center px-6 py-2 text-sm font-medium leading-4 text-white bg-indigo-600 border border-transparent rounded-md shadow-sm sm:py-3 sm:text-base hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Apply Scholarship
                </Link>

                <Link
                    :href="
                        route('pass-requirements.index', {
                            id: scholarship.id,
                        })
                    "
                    v-else-if="
                        scholarship.scholarshipType === 'academic scholarship'
                    "
                    class="inline-flex items-center px-6 py-2 text-sm font-medium leading-4 text-white bg-indigo-600 border border-transparent rounded-md shadow-sm sm:py-3 sm:text-base hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Apply Now
                </Link>

                <ButtonLinkPrivate
                    v-else-if="
                        scholarship.scholarshipType === 'private scholarship'
                    "
                    :scholarship="scholarship"
                />
            </div>
        </div>
    </template>
</template>
