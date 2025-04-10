<script setup>
defineProps(["appliedScholarship", "decodedRequirements"]);
import { ref } from "vue";

const isModalOpen = ref(false);
const modalFileIndex = ref(null);
const modalImageIndex = ref(null);

const openModal = (fileIndex, imageIndex) => {
    modalFileIndex.value = fileIndex;
    modalImageIndex.value = imageIndex;
    isModalOpen.value = true;
};

const closeModal = () => {
    isModalOpen.value = false;
    modalFileIndex.value = null;
    modalImageIndex.value = null;
};
</script>

<template>
    <div
        v-if="
            appliedScholarship.scholarship.scholarshipType ===
            'academic scholarship'
        "
    >
        <div
            class="relative grid grid-cols-1 mt-10 gap-x-6 gap-y-4 sm:grid-cols-6"
        >
            <div class="sm:col-span-3">
                <span class="block text-sm font-medium leading-6 text-gray-900"
                    >Scholarship</span
                >
                <div class="mt-2">
                    <div
                        class="block px-4 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{ appliedScholarship.scholarship.scholarshipName }}
                    </div>
                </div>
            </div>
            <div class="sm:col-span-3">
                <span class="block text-sm font-medium leading-6 text-gray-900"
                    >Student ID</span
                >
                <div class="mt-2">
                    <div
                        class="block px-4 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{ appliedScholarship.student_id }}
                    </div>
                </div>
            </div>
            <div class="sm:col-span-3">
                <span class="block text-sm font-medium leading-6 text-gray-900"
                    >Campus</span
                >
                <div class="mt-2">
                    <div
                        class="block px-4 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{ appliedScholarship.campus }}
                    </div>
                </div>
            </div>
            <div class="sm:col-span-3">
                <span class="block text-sm font-medium leading-6 text-gray-900"
                    >Degree Program</span
                >
                <div class="mt-2">
                    <div
                        class="block px-4 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{ appliedScholarship.degree }}
                    </div>
                </div>
            </div>
            <div class="sm:col-span-3">
                <span class="block text-sm font-medium leading-6 text-gray-900"
                    >Phone Number</span
                >
                <div class="mt-2">
                    <div
                        class="block px-4 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{ appliedScholarship.average }}
                    </div>
                </div>
            </div>
            <div class="sm:col-span-3">
                <span class="block text-sm font-medium leading-6 text-gray-900"
                    >Address</span
                >
                <div class="mt-2">
                    <div
                        class="block px-4 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{ appliedScholarship.admission_test_score }}
                    </div>
                </div>
            </div>
            <div class="sm:col-span-3">
                <span class="block text-sm font-medium leading-6 text-gray-900"
                    >Email Address</span
                >
                <div class="mt-2">
                    <div
                        class="block px-4 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{ appliedScholarship.email }}
                    </div>
                </div>
            </div>
            <div class="sm:col-span-3">
                <span class="block text-sm font-medium leading-6 text-gray-900"
                    >First Name</span
                >
                <div class="mt-2">
                    <div
                        class="block px-4 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{ appliedScholarship.first_name }}
                    </div>
                </div>
            </div>
            <div class="sm:col-span-3">
                <span class="block text-sm font-medium leading-6 text-gray-900"
                    >Middle Name</span
                >
                <div class="mt-2">
                    <div
                        class="block px-4 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{ appliedScholarship.middle_name }}
                    </div>
                </div>
            </div>
            <div class="sm:col-span-3">
                <span class="block text-sm font-medium leading-6 text-gray-900"
                    >Last Name</span
                >
                <div class="mt-2">
                    <div
                        class="block px-4 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{ appliedScholarship.last_name }}
                    </div>
                </div>
            </div>
        </div>

        <div v-if="appliedScholarship.remarks" class="mt-4">
            <span v-if="appliedScholarship.approve === 1"> Approve</span>
            <span v-if="appliedScholarship.reject === 1"> Reject</span>
            Remarks:

            <div class="sm:col-span-3">
                <div class="mt-2">
                    <div
                        class="block px-4 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                        {{ appliedScholarship.remarks }}
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center gap-2 mt-6">
            <h2>Requirements:</h2>
        </div>
        <div
            v-for="(file, fileIndex) in decodedRequirements"
            :key="fileIndex"
            class="mt-4"
        >
            <p>
                {{
                    appliedScholarship.scholarship.requirements.split("|")[
                        fileIndex
                    ]
                }}:
            </p>
            <div
                class="grid grid-cols-1 mt-6 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8"
            >
                <div
                    class="relative cursor-pointer group"
                    v-for="(image, imageIndex) in file"
                    :key="imageIndex"
                >
                    <div
                        class="w-full overflow-hidden bg-gray-200 rounded-md aspect-h-1 aspect-w-1 lg:aspect-none group-hover:opacity-75 lg:h-80"
                    >
                        <img
                            :src="`/storage/${image}`"
                            alt="Requirements"
                            class="object-cover object-center w-full h-full lg:h-full lg:w-full"
                            @click="openModal(fileIndex, imageIndex)"
                        />
                    </div>
                </div>
            </div>
        </div>

        <div
            v-if="isModalOpen"
            class="fixed z-[1000] inset-0 my-4 flex items-center justify-center"
        >
            <div
                class="fixed inset-0 bg-black opacity-75"
                @click="closeModal"
            ></div>
            <div class="relative z-10 max-w-2xl p-4 mx-auto bg-white rounded">
                <div class="mt-4">
                    <div class="flex justify-between items-">
                        <p>
                            {{
                                appliedScholarship.scholarship.requirements.split(
                                    "|"
                                )[modalFileIndex]
                            }}:
                        </p>
                        <button
                            @click="closeModal"
                            class="text-gray-500 hover:text-gray-700 focus:outline-none"
                        >
                            Close
                        </button>
                    </div>
                    <div class="">
                        <div class="mt-4">
                            <img
                                :src="`/storage/${decodedRequirements[modalFileIndex][modalImageIndex]}`"
                                alt="Requirements"
                                class="h-[30rem] w-[25rem]"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
