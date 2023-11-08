import React, { useState } from 'react';
import { Link } from '@inertiajs/react';
import PrimaryButton from './PrimaryButton';
import SecondaryButton from './SecondaryButton';
import CommentSection from '@/Components/CommentSection';
import axios from 'axios';

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

function CourseCard({ Course, Users, authUser }) {
    const [showModal, setShowModal] = useState(false);

    const commentsLength = (comments) => {
        return comments.length;
    }

    const likesLength = (likes) => {
        return likes.length;
    }
    const closeModal = () => {};

    const course_id = Course.id;

    const formData = new FormData();
    formData.append("course_id", course_id);

    const storeLike = async () => {
        try {
            const request = await axios.post(route('create-like'), formData); // Replace with your API endpoint
            if (request.data.status === "success") {
                const heartSpan = document.getElementById(`heart-${Course.id}`);
                const heartIcon = document.getElementById(`heart-icon-${Course.id}`);
                const heartClass = heartIcon.classList;
                heartSpan.innerHTML = request.data.data;
                heartClass.contains('mdi-heart-outline')
                    ? (heartClass.remove('mdi-heart-outline'), heartClass.toggle('mdi-heart'))
                    : (heartClass.remove('mdi-heart'), heartClass.toggle('mdi-heart-outline'));


            }
        } catch (error) {
            console.error('Error liking this course:', error.message);
        }
    }

    const userHasLiked = () => {
        const userId = authUser.id;
        return Users.some(User => User.user_id === userId);
    };

    return (
        <div className="w-full bg-white border border-gray-200 rounded-lg">
            <div className="flex items-center space-x-3 w-full px-5 bg-gray-50 rounded-t-lg">
                <img src={Course.provider.profile_picture_path} className="h-12 w-12 rounded-full" alt={Course.provider.name} />
                <div>
                    <h5 className="font-medium mb-1 text-xl text-gray-900">{Course.provider.name}</h5>
                    <span className="font-medium mb-1 text-sm text-gray-900">
                        {formatCreatedAt(new Date(Course.created_at))}
                    </span>
                </div>
            </div>
            <div className="flex flex-col items-center pb-10 relative">
                <img className="w-32 h-32 mb-3 rounded-lg object-cover" src={Course.thumbnail_path} alt={Course.name} />
                <h5 className="mb-1 text-xl font-medium text-gray-900">{Course.name}</h5>

                <div className="flex flex-wrap mt-4 gap-2 md:mt-6 w-full px-5 mb-2">
                    <Link href={`/watch/course/${Course.id}/${Course.name}`} className="flex flex-grow">
                        <PrimaryButton className="py-3 flex flex-grow">
                            Watch Course
                        </PrimaryButton>
                    </Link>
                    <div className="w-full rounded-lg absolute bottom-1 right-5">
                        <div className="flex items-center justify-end gap-2">
                            <SecondaryButton onClick={storeLike}>
                                <i className={userHasLiked() ? "fa-2xl mdi mdi-heart" : "fa-2xl mdi mdi-heart-outline"} id={`heart-icon-${Course.id}`} />
                                <span id={`heart-${Course.id}`}>{likesLength(Course.likes)}</span>
                            </SecondaryButton>

                            <SecondaryButton onClick={() => setShowModal(true)}>
                                <i className="fa-2xl mdi mdi-comment-outline" />
                                <span>{commentsLength(Course.comments)}</span>
                            </SecondaryButton>

                            <SecondaryButton>
                                <i className="bx bx-paper-plane fa-2xl" />
                                <span>1</span>
                            </SecondaryButton>
                        </div>
                    </div>
                </div>
                <CommentSection show={showModal} onClose={closeModal} Course={Course} user={authUser} setShowModal={setShowModal} />
            </div>
        </div>
    );
}

export default CourseCard;
