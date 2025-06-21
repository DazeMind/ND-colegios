import SideBar from '@/Components/SideBar/SideBar';

export default function AuthenticatedLayout({ header, children }) {
    return (
        <div className="flex min-h-screen bg-gray-100">
            <div className="w-64 fixed top-0 left-0 h-full z-40">
                <SideBar />
            </div>

            <div className="flex-1 ml-64">
                {header && (
                    <header className="bg-white shadow">
                        <div className="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                            {header}
                        </div>
                    </header>
                )}

                <main className="">{children}</main>
            </div>
        </div>
    );
}
