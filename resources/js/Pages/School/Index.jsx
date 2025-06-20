import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import Modal from '@/Components/Modal';
import { TrashIcon } from '@heroicons/react/24/solid'; // versión sólida
import TextInput from '@/Components/TextInput';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Button } from '@headlessui/react';
import { Head,router } from '@inertiajs/react';
import { Typography } from '@material-tailwind/react';

function createSchool() {
    router.get(route('schools.create'), {
        onFinish: () => console.log('redirigiendo'),
    });
}
function handleDelete($id){
    router.delete(route('schools.destroy',{school: $id}), {
        onFinish: () => console.log('redirigiendo'),
    }); 
}
const TABLE_HEAD = ['ID', 'COLEGIO', 'RUT', ''];

export default function Dashboard({schools}) {
    return (
        <AuthenticatedLayout
        header={<h2 className="text-xl font-semibold leading-tight text-gray-800">Colegios</h2>}
        >
        <Head title="Dashboard" />
        <div className="py-12">
            <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div className="mb-6 flex justify-between items-center">
                    <TextInput className="text-lg font-bold" placeholder="Buscar ..." />
                    <Button onClick={createSchool} className='ms-12 bg-yellow-500 text-white px-12 py-2 rounded hover:bg-blue-600'>
                    + NUEVO 
                    </Button>
                </div>

                <div className="overflow-x-auto bg-white shadow-sm sm:rounded-lg">
                    <table className="w-full min-w-max table-auto text-left">
                        <thead>
                            <tr>
                            {TABLE_HEAD.map((head) => (
                                <th
                                key={head}
                                className="border-b border-blue-gray-100 bg-blue-gray-50 p-4"
                                >
                                <Typography
                                    variant="small"
                                    color="blue-gray"
                                    className="font-normal opacity-70"
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
                        <div>
                            FOOTER 0 - 8 filas por pagina[]  [1,2,3,4,5]
                        </div>
            </div>
        </div>
        </AuthenticatedLayout>
    );
}

