import ApplicationLogo from '@/Components/ApplicationLogo';
import { Link } from '@inertiajs/react';
import { PropsWithChildren } from 'react';

export default function Guest({ children, as="admin" }: PropsWithChildren<{as?: 'admin'|'pharmacy'|'doctor'}>) {
    const icons = {
        admin: 'icon-[wpf--administrator]',
        doctor: 'icon-[healthicons--doctor]',
        pharmacy: 'icon-[healthicons--pharmacy]',
    }
    return (
        <div className="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <Link href="/">
                    <i className={`${icons[as]} text-gray-500 text-8xl`}></i>
                </Link>
            </div>

            <div className="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {children}
            </div>
        </div>
    );
}
