import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import Modal from '@/Components/Modal';
import TextInput from '@/Components/TextInput';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Button } from '@headlessui/react';
import { Head,router } from '@inertiajs/react';
import { Typography } from '@material-tailwind/react';

function createInstitution() {
    router.get(route('institution.create'), {
        onFinish: () => console.log('redirigiendo'),
    });
}
function emitClose() {
    
}
const TABLE_HEAD = ['ID', 'CLIENTE', 'ESTADO', 'RESPONSABLE'];

export default function Dashboard({institutions}) {
    return (
        <AuthenticatedLayout
        header={<h2 className="text-xl font-semibold leading-tight text-gray-800">Dashboard</h2>}
        >
        <Head title="Dashboard" />
        <div className="py-12">
            <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div className="mb-6 flex justify-between items-center">
                    <TextInput className="text-lg font-bold" placeholder="Buscar ..." />
                    <Button onClick={createInstitution} className='ms-12 bg-yellow-500 text-white px-12 py-2 rounded hover:bg-blue-600'>
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
                        {institutions.map((institution, index) => {
                        const isLast = index === institutions.length - 1;
                        const classes = isLast ? "p-4" : "w-1/4 p-4 border-b border-blue-gray-50";

                        return (
                            <tr key={institution.id}>
                                <td className={classes}>
                                    <Typography variant="small" color="blue-gray" className="font-normal">
                                    {institution.id}
                                    </Typography>
                                </td>
                                <td className={classes}>
                                    <Typography variant="small" color="blue-gray" className="font-normal">
                                    {institution.name}
                                    </Typography>
                                </td>
                                <td className={classes}>
                                    <Typography variant="small" color="blue-gray" className="font-normal">
                                    * {institution.state.name}
                                    </Typography>
                                </td>
                                <td className={classes}>
                                    <Typography variant="small" color="blue-gray" className="font-normal">
                                    {institution.creator.email}
                                    </Typography>
                                </td>
                            {/* <td className={classes}>
                                <Typography
                                as="a"
                                href={`/institutions/${institution.id}/edit`}
                                variant="small"
                                color="blue-gray"
                                className="font-medium cursor-pointer"
                                >
                                Editar
                                </Typography>
                            </td> */}
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

