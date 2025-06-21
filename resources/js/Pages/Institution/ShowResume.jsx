import TabsNav from '@/Components/NavBar/NavsBar';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import { Typography } from '@material-tailwind/react';
import { useEffect } from 'react';

export default function Dashboard({ institution }) {
    useEffect(()=>{
        console.log(institution)
    },[])

    return (
        <AuthenticatedLayout 
            header={<TabsNav activeTabKey="resumen"/>}
        >
            <Head title="Institución" />
            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg p-6">
                        <div className="mb-8" id='client'>
                            <div className='border-l-8 border-black pl-4 space-y-1 mb-2'>
                                <Typography variant="h5" color="blue-gray" className="mb-4 font-semibold text-xl">
                                    Cliente
                                </Typography>
                                <Typography variant="h5" color="blue-gray" className="mb-4 font-semibold text-xl">
                                    {institution.name}
                                </Typography>
                            </div>
                            <div className="ms-8 gap-y-2">
                                <ul className='border-l-8 border-gray-500 pl-4 space-y-1'>
                                    <li><span className="font-semibold">RUT:</span> {institution.rut}</li>
                                    <li><span className="font-semibold">Región:</span> {institution.region.name}</li>
                                    <li><span className="font-semibold">Comuna:</span> {institution.commune.name}</li>
                                    <li><span className="font-semibold"><span className="font-semibold">Teléfono:</span> {institution.phone}</span></li>
                                    <li><span className="font-semibold">Fecha inicio:</span> {institution.start_date}</li>
                                </ul>
                            </div>
                        </div>
                       {institution.schools.map((school, index) => (
                        <div key={index}>
                            <Typography variant="h6" color="blue-gray" className="font-semibold text-lg mb-2">
                                Colegio: {school.name}
                            </Typography>
                            <div key={school.id} className="ms-8">
                                <ul className="border-l-8 border-gray-500 pl-4 space-y-1">
                                    <li><span className="font-semibold">RUT:</span> {school.rut}</li>
                                    <li><span className="font-semibold">Región:</span> {school.region.name}</li>
                                    <li><span className="font-semibold">Comuna:</span> {school.commune.name}</li>
                                    <li><span className="font-semibold">Dirección:</span> {school.address}</li>
                                    <li><span className="font-semibold">Teléfono:</span> {school.phone}</li>
                                </ul>

                                {school.users.length > 0 && (
                                    <div className="mt-4" id="users">
                                        {school.users.map((user, idx) => (
                                            <div key={idx}>
                                                <Typography variant="h6" color="blue-gray" className="font-semibold text-lg mb-4">
                                                    Usuarios: {user.name}
                                                </Typography>
                                                <ul  className="border-l-8 border-gray-500 pl-4 space-y-1 mb-4">
                                                    <li><span className="font-semibold">RUT:</span> {user.rut}</li>
                                                </ul>
                                            </div>
                                            
                                        ))}
                                    </div>
                                )}
                            </div>
                            </div>
                        ))}
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}