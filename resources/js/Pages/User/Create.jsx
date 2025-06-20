import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import TextInput from '@/Components/TextInput';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Button } from '@headlessui/react';
import { Head, useForm } from '@inertiajs/react';
import { validateRut,validatePhone } from '@/Utils/Validations';
import { useMemo, useState } from 'react';
// import { Select,Option  } from '@material-tailwind/react';
import Select from 'react-select';

export default function Create({ schools }) {

    const options = schools.map((school) => ({
      value: school.id,
      label: school.name,
    }));

    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',        
        surnames: '',         
        rut: '',      
        phone: '', 
        email: '',      
        schools_ids: [],
    });

    const selectedSchools = options.filter(option => data.schools_ids.includes(option.value));

    const [phoneFrontendError, setPhoneFrontendError] = useState(null);
    const [rutFrontendError, setRutFrontendError] = useState(null);
    

    const handleInputChange = (e) => {
        const { name, value } = e.target;
        setData(name, value);
        console.log("comuna seleccionada",name,value);
        if (name === 'phone') {
            setPhoneFrontendError(validatePhone(value) ? null : 'Teléfono no válido');
        }

        if (name === 'rut') {
            setRutFrontendError(validateRut(value) ? null : 'RUT no válido');
        }
    };

    const handleSubmit = (e) => {
        e.preventDefault();

        // Validación antes de enviar
        const isRutValid = validateRut(data.rut);
        const isPhoneValid = validatePhone(data.phone);

        if (!isRutValid) setRutFrontendError('RUT no válido');
        if (!isPhoneValid) setPhoneFrontendError('Teléfono no válido');

        if (!isRutValid || !isPhoneValid) return;

        post(route('user.store'), {
            onSuccess: () => {
                console.log('Usuario creado correctamente');
                reset();
            },
            onError: (formErrors) => {
                console.error('Error al crear el Usuario:', formErrors);
            },
            onFinish: () => {
                console.log('Formulario finalizado');
            }
        });
    };

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Usuarios
                </h2>
            }
        >
            <Head title="Crear Usuario" />
            <div className="">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="bg-white shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            <form onSubmit={handleSubmit} className="space-y-4">

                                <div className="flex gap-4">
                                    <div className="w-1/3 ">
                                        <InputLabel htmlFor="name" value="Nombre *" />
                                        <TextInput
                                            id="name"
                                            type="text" 
                                            name="name"
                                            value={data.name}
                                            className="mt-1 block w-full"
                                            autoComplete="off" 
                                            isFocused={true}
                                            onChange={handleInputChange}
                                        />
                                        <InputError message={errors.name} className="mt-2" />
                                    </div>
                                    <div className="w-1/3">
                                        <InputLabel htmlFor="surnames" value="Apellidos *" />
                                        <TextInput
                                            id="surnames"
                                            type="text" 
                                            name="surnames"
                                            value={data.surnames}
                                            className="mt-1 block w-full"
                                            autoComplete="off" 
                                            isFocused={true}
                                            onChange={handleInputChange}
                                        />
                                        <InputError message={errors.surnames} className="mt-2" />
                                    </div>
                                    <div className="w-1/3">
                                        <InputLabel htmlFor="rut" value="RUT (sin puntos con guion) *" />
                                        <TextInput
                                            id="rut"
                                            type="text"
                                            name="rut"
                                            value={data.rut}
                                            className="mt-1 block w-full"
                                            onChange={handleInputChange}
                                        />
                                        <InputError message={rutFrontendError || errors.rut} className="mt-2" />
                                        <InputError message={errors.rut} className="mt-2" />
                                    </div>
                                </div>
                                <div className="flex gap-4">
                                    <div className="w-1/3">
                                        <InputLabel htmlFor="phone" value="Teléfono *" />
                                        <TextInput
                                            id="phone"
                                            type="text"
                                            name="phone"
                                            value={data.phone}
                                            
                                            className="mt-1 block w-full"
                                            onChange={handleInputChange}
                                        />
                                        <InputError message={phoneFrontendError || errors.phone} className="mt-2" />
                                        <InputError message={errors.phone} className="mt-2" />
                                    </div>
                                    <div className="w-1/3">
                                         <InputLabel htmlFor="email" value="Correo *" />
                                        <TextInput
                                            id="email"
                                            type="text"
                                            name="email"
                                            value={data.email}
                                            className="mt-1 block w-full"
                                            onChange={handleInputChange}
                                        />
                                        <InputError message={errors.email} className="mt-2" />
                                    </div>
                                    <div className="w-1/3">
                                        <InputLabel htmlFor="schools" value="Colegios asignados *" />
                                        <Select
                                            isMulti
                                            id="schools"
                                            name="schools_ids"
                                            options={options}
                                            value={selectedSchools}
                                            onChange={(selected) => {
                                                const selectedIds = selected.map(s => s.value);
                                                setData('schools_ids', selectedIds);
                                            }}
                                            className="mt-1 block w-full"
                                            classNamePrefix="select"
                                        />
                                        <InputError message={errors.schools_ids} className="mt-2" />
                                    </div>
                                </div>

                                <div className="flex items-center justify-end mt-4">
                                    <Button
                                        type="submit"
                                        className="ml-4"
                                        disabled={processing} // Disable button during submission
                                    >
                                        {processing ? 'Cancelando...' : 'Cancelar'}
                                    </Button>
                                    <Button
                                        type="submit"
                                        className="ml-4"
                                        disabled={processing} // Disable button during submission
                                    >
                                        {processing ? 'Guardando...' : 'Crear Cliente'}
                                    </Button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}