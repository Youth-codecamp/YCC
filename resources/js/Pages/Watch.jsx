import React from 'react';
import AppLayout from "@/Layouts/AppLayout";
import PrimaryButton from '@/Components/PrimaryButton';

function formatCreatedAt(date) {
    var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    var day = date.getDate();
    var month = date.getMonth();
    month = months[month];
    if (day < 10) {
        day = '0' + day;
    }
    return day + ', ' + month;
}

function CoursePage({ Course, Provider }) {
    const providerProfile = `/${Provider.profile_url}`;

    return (
        <AppLayout title="Watch Course">
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white dark:bg-gray-800  shadow-xl sm:rounded-lg">
                        <iframe src={Course.embed_url} frameBorder="0" className="w-full p-2 aspect-video rounded-lg mx-auto"></iframe>
                        <div className="text-left w-full mt-2 py-5 px-5 ">
                            <div className="w-full px-5 bg-gray-50 dark:bg-gray-700/60 p-2 rounded-lg shadow-gray-500/20 ring-1 ring-inset ring-gray-400/10 ">
                                <p className="font-bold dark:text-white text-black" style={{ textTransform: 'capitalize' }}>
                                    {Course.name}
                                </p>
                                <span className="font-medium mb-1 text-sm text-gray-900 dark:text-white">
                                    {formatCreatedAt(new Date(Course.created_at))}
                                </span>
                                <div className="flex items-center ">
                                    <img src={providerProfile} className="h-12 w-12 rounded-full" alt={Provider.name} />
                                    <div className="p-2">
                                        <h5 className="font-medium mb-1 text-xl  text-gray-900 dark:text-white">
                                            {Provider.name}
                                        </h5>
                                        <span className="font-medium mb-1 text-sm text-gray-900 dark:text-white">Mentor</span>
                                    </div>
                                </div>
                            </div>
                            <a href={route('dashboard')}>
                                <PrimaryButton className="lg:py-4 mt-2 md:py-2 md:px-6 lg:px-8 gap-2">
                                    Watch More <i className="bx bxs-share bx-rotate-180"></i>
                                </PrimaryButton>
                            </a>
                            <div>
                                <p className="font-medium dark:text-white/70 text-black">{Course.description}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}

export default CoursePage;
