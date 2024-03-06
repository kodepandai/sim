import { useEffect, FormEventHandler } from 'react';
import GuestLayout from '@/Layouts/GuestLayout';
import PrimaryButton from '@/Components/PrimaryButton';
import {TextInput, Checkbox, Button} from '@mantine/core';
import { Head, Link, useForm } from '@inertiajs/react';
import SecondaryButton from '@/Components/SecondaryButton';

export default function Login({ status, canResetPassword, as }: { status?: string, canResetPassword: boolean, as: 'admin'|'pharmacy'|'doctor' }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        email: '',
        password: '',
        remember: false,
    });

    useEffect(() => {
        return () => {
            reset('password');
        };
    }, []);

    const submit: FormEventHandler = (e) => {
        e.preventDefault();

        post(route(`${as}:login.store`));
    };

    const back = ()=>{
        window.history.back()
    }

    return (
        <GuestLayout as={as}>
            <Head title="Log in" />

            {status && <div className="mb-4 font-medium text-sm text-green-600">{status}</div>}

            <form onSubmit={submit}>
                <div>
                    <TextInput
                        label="Email"
                        required
                        id="email"
                        type="email"
                        name="email"
                        value={data.email}
                        className="mt-1 block w-full"
                        autoComplete="username"
                        autoFocus={true}
                        onChange={(e) => setData('email', e.target.value)}
                        error={errors.email}
                    />
                </div>

                <div className="mt-4">

                    <TextInput
                        label="Password"
                        required
                        id="password"
                        type="password"
                        name="password"
                        value={data.password}
                        className="mt-1 block w-full"
                        autoComplete="current-password"
                        onChange={(e) => setData('password', e.target.value)}
                        error={errors.password}
                    />
                </div>

                <div className="block mt-4">
                    <label className="flex items-center">
                        <Checkbox
                            label="Remember me"
                            name="remember"
                            checked={data.remember}
                            onChange={(e) => setData('remember', e.target.checked)}
                        />
                    </label>
                </div>

                <div className="flex items-center justify-end mt-4">
                    <Button color="gray" className="ms-4" disabled={processing} onClick={back}>
                        Back
                    </Button>
                    {canResetPassword && (
                        <Button
                            component={Link}
                            href={route('password.request')}
                            className="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            Forgot your password?
                        </Button>
                    )}

                    <Button className="ms-4" disabled={processing}>
                        Log in
                    </Button>
                </div>
            </form>
        </GuestLayout>
    );
}
