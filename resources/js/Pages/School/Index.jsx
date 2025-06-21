import { TrashIcon } from '@heroicons/react/24/solid';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Button } from '@headlessui/react';
import { Head,router,usePage } from '@inertiajs/react';
import { Typography } from '@material-tailwind/react';
import FlashMessage from '@/Components/FlashMessage';
import { useEffect, useState } from 'react';
import TabsNav from '@/Components/NavBar/NavsBar';

function createSchool() {
    router.get(route('schools.create'), {
        onFinish: () => console.log('redirigiendo'),
    });
}
function handleDelete($id){
    if (confirm("¿Estás seguro de eliminar el registro?")) {  
        router.delete(route('schools.destroy',{school: $id}), {
            preserveScroll: true,
            onSuccess: () => {
                console.log('Colegio eliminado');
            },
        }); 
    }
}
const TABLE_HEAD = ['ID', 'COLEGIO', 'RUT', ''];

export default function Dashboard({schools}) {
    const { flash } = usePage().props;
    const [flashMessage, setFlashMessage] = useState(flash);

    useEffect(() => {
        if (flash?.message) {
            setFlashMessage(flash);
        }
    }, [flash]);

    return (
        <AuthenticatedLayout
        header={<TabsNav activeTabKey="colegios"/>}
        >
        <Head title="Dashboard" />
        <div className="py-12">
            <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div className="mb-6 flex justify-end items-end">
                    {/* <TextInput className="text-lg font-bold" placeholder="Buscar ..." /> */}
                    <Button onClick={createSchool} className='ms-12 bg-yellow-500 text-white px-12 py-2 rounded hover:bg-blue-600'>
                    + NUEVO 
                    </Button>
                </div>
                {flashMessage?.message && (
                    <div className="p-6">
                        <FlashMessage
                            variant={flashMessage.type}
                            title={flashMessage.title}
                            content={flashMessage.content}
                            show={true}
                            onDismiss={() => setFlashMessage(null)}
                        />
                    </div>
                )}
                <div className="overflow-x-auto bg-white shadow-sm sm:rounded-lg">
                    <table className="w-full min-w-max table-auto text-left">
                        <thead className='bg-gray-300'>
                            <tr>
                            {TABLE_HEAD.map((head) => (
                                <th
                                key={head}
                                className="border-b border-blue-gray-100 bg-blue-gray-50 p-4"
                                >
                                <Typography
                                    variant="small"
                                    color="blue-gray"
                                    className="font-bold text-gray-500 opacity-70"
                                >
                                    {head}
                                </Typography>
                                </th>
                            ))}
                            </tr>
                        </thead>

                    <tbody>
                        {schools.map((school, index) => {
                        const isLast = index === school.length - 1;
                        const classes = isLast ? "p-4" : "w-1/4 p-4 border-b border-blue-gray-50";

                        return (
                            <tr key={school.id}>
                                <td className={classes}>
                                    <Typography variant="small" color="blue-gray" className="font-normal">
                                    {school.id}
                                    </Typography>
                                </td>
                                <td className={classes}>
                                    <Typography variant="small" color="blue-gray" className="font-normal">
                                    {school.name}
                                    </Typography>
                                </td>
                                <td className={classes}>
                                    <Typography variant="small" color="blue-gray" className="font-normal">
                                    {school.rut}
                                    </Typography>
                                </td>
                                
                            <td className={classes}>
                                <Button
                                    onClick={() => handleDelete(school.id)}
                                    className="flex items-center gap-1 text-sm text-red-600 hover:text-red-800"
                                    >
                                    <TrashIcon className="h-5 w-5" />
                                </Button>
                            </td>
                            </tr>
                        );
                        })}
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
        </AuthenticatedLayout>
    );
}

