import React from 'react';
import { router } from '@inertiajs/react';

export default function TabsNav({ activeTabKey }) {
    const tabs = [
        { name: 'Configuración cliente', key: 'cliente', route: 'institution.index' },
        { name: 'Colegios', key: 'colegios', route: 'schools.index' },
        { name: 'Usuarios', key: 'usuarios', route: 'user.index' },
        { name: 'Resumen', key: 'resumen', route: 'institution.show' },
    ];

    return (
        <div className="w-full flex justify-center">
            <div className="flex w-full max-w-4xl">
                {tabs.map((tab) => (
                    <button
                        key={tab.key}
                        onClick={() => router.get(route(tab.route))}
                        className={`flex-1 px-6 py-3 text-sm font-medium text-center border-r last:border-r-0 transition-colors duration-150 ${
                            tab.key === activeTabKey
                                ? 'bg-gray-400 text-black'
                                : 'bg-gray-200 text-gray-500 hover:bg-gray-300'
                        }`}
                    >
                        {tab.name}
                    </button>
                ))}
            </div>
        </div>
    );
}