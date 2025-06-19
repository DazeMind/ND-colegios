import ApplicationLogo from '@/Components/ApplicationLogo';
import { Link } from '@inertiajs/react';

export default function GuestLayout({ children }) {
    return (
        <div className="min-h-screen grid grid-cols-1 md:grid-cols-2">
            <div className="flex items-center justify-center bg-white">
                <Link href="/">
                    <ApplicationLogo className="h-72 w-72" />
                </Link>
            </div>
            <div className="flex flex-col justify-center items-center bg-blue-100 px-8 py-12">
                <div className="w-full max-w-md">
                    <h1 className="text-2xl font-bold text-gray-900">Bienvenido</h1>
                    <p className="mt-2 text-sm text-gray-600">
                        Inicia sesión si tienes una cuenta con nosotros
                    </p>

                    <div className="mt-6 p-6 ">
                        {children}
                    </div>
                </div>
            </div>
        </div>
    );
}
