import React from 'react';
import CourseCard from "@/Components/CourseCard";
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

function CourseDashboard({ Courses, auth }) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Courses Dashboard</h2>}
        >
            <Head title="Dashboard" />
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <h1 className="mt-8 text-2xl font-medium text-gray-900">
                        Our Courses
                    </h1>
                    <p className="mt-6 text-gray-500  leading-relaxed">
                        This courses provided to help you coding journey
                        <br />
                        Those courses provided by Coding experts that will give information you need to make your coding better.
                        <br />
                        We hope you love it.
                    </p>
                    <div>
                        <div className="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-3 gap-2 lg:gap-3 p-6 lg:p-8">
                            {Courses.map((Course, index) => (
                                <CourseCard key={index} Course={Course} Users={Course.likes} authUser={auth.user} />
                            ))}
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>

    );
}

export default CourseDashboard;
