import React, { useState } from 'react';
import TextInput from "@/Components/TextInput";
import Modal from "@/Components/Modal";
import PrimaryButton from "@/Components/PrimaryButton";
import InputError from "@/Components/InputError";
import { useForm } from '@inertiajs/react';

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

function CommentModal({ Course, show, user ,setShowModal }) {
    const [content, setContent] = useState('');
    const [processing, setProcessing] = useState(false);
    const [errors, setErrors] = useState({});

    const close = () => {
        setShowModal(false)
    };
    const form = useForm({
        content: '',
        course_id: props.Course.id,
      });

    const submit = () => {
        form.post(route('create-comment'), {
            onFinish: () => form.reset('content')
        });
    };

    return (
        <Modal show={show}  onClose={close}>
            <div className="my-2 px-5 w-full flex gap-1 items-center flex-wrap">
                <img src={user.profile_photo_url} className="h-8 w-8 object-cover rounded-full" alt="User Profile" />
                <form onSubmit={submit} className="flex-grow">
                    <TextInput
                        value={content}
                        onChange={(e) => setContent(e.target.value)}
                        placeholder="Add a comment"
                        className={`w-full ${processing ? 'opacity-25' : ''}`}
                        disabled={processing}
                    />
                    <InputError message={errors.content} className="mt-1" />
                </form>
            </div>

            {Course.comments.map(comment => (
                <div key={comment.id} className="my-2 px-5">
                    <div className="flex items-start space-x-3 w-full bg-gray-50 dark:bg-gray-700/60 p-2 shadow-lg border border-gray-200s dark:border-0 rounded-lg dark:ring-1 dark:ring-gray-700 ring-inset cursor-pointer">
                        <img
                            alt={comment.user.name}
                            src={comment.user.profile_photo_url}
                            className="h-10 w-10 rounded-full object-cover"
                        />
                        <div className="w-full">
                            <h5 className="font-medium mb-1 text-xl text-gray-900 dark:text-white">
                                {comment.user.name} {comment.user.is_verified === 1 && <i className="bx bxs-check-circle text-blue-500"></i>}
                            </h5>
                            <h5 className="font-medium mb-1 text-sm text-gray-900 dark:text-white">
                                {comment.content}
                            </h5>
                            <div className="text-right">
                                <span className="font-medium mb-1 text-sm text-right text-gray-600 dark:text-white">
                                    {formatCreatedAt(new Date(comment.created_at))}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            ))}
        </Modal>
    );
}

export default CommentModal;
