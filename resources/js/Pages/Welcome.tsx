import { Link, Head } from "@inertiajs/react";
import { PageProps } from "@/types";

export default function Welcome({
    auth,
    laravelVersion,
    phpVersion,
}: PageProps<{ laravelVersion: string; phpVersion: string }>) {
    return (
        <>
            <Head title="Welcome" />
            <div className="container mx-auto h-screen">
                <div className="flex w-full h-full">
                    <div className="flex flex-col gap-8 min-h-96 my-auto w-full">
                        <h1 className="text-center">
                            Selamat Datang, Silakan Pilih Role untuk Login
                        </h1>
                        <div className="grid grid-cols-3 gap-8">
                                <Link href={route('admin:login')} className="shadow p-6 rounded-lg flex flex-col gap-2 items-center">
                                    <i className="icon-[wpf--administrator] text-gray-500 text-8xl"></i>
                                    <span>Administrator</span>
                                </Link>

                            <div className="shadow p-6 rounded-lg flex flex-col gap-2 items-center">
                                <i className="icon-[healthicons--doctor] text-gray-500 text-8xl"></i>
                                <span>Dokter</span>
                            </div>
                            <div className="shadow p-6 rounded-lg flex flex-col gap-2 items-center">
                                <i className="icon-[healthicons--pharmacy] text-gray-500 text-8xl"></i>
                                <span>Farmasi</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}
