import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import TextInput from '@/Components/TextInput';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Button } from '@headlessui/react';
import { Head, useForm } from '@inertiajs/react';
import { validateRut,validatePhone } from '@/Utils/Validations';
import { useMemo, useState } from 'react';
import { Select,Option  } from '@material-tailwind/react';

export default function Create({ regions }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',        
        rut: '',         
        region: '',      
        commune: '',      
        address: '',   
        phone: '', 
        start_date: '',
    });
    const [phoneFrontendError, setPhoneFrontendError] = useState(null);
    const [rutFrontendError, setRutFrontendError] = useState(null);
    const [selectedRegionId, setSelectedRegionId] = useState(null);

    const filteredCommunes = useMemo(() => {
        const region = regions.find(r => r.id === selectedRegionId);
        if (!region) return [];        
        return region.province.flatMap(province => province.comuna);
    }, [selectedRegionId, regions]);

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

        post(route('institution.store'), {
            onSuccess: () => {
                console.log('Cliente creado correctamente');
                reset();
            },
            onError: (formErrors) => {
                console.error('Error al crear el cliente:', formErrors);
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
                    CREAR SCHOOL
                </h2>
            }
        >
            <Head title="Crear Cliente" /> {/* Changed title to be more specific */}
            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            {/* 5. Attach the handleSubmit function to the form's onSubmit event */}
                            <form onSubmit={handleSubmit} className="space-y-4">
                                <div>
                                    <InputLabel htmlFor="name" value="Nombre" />
                                    <TextInput
                                        id="name"
                                        type="text" // Changed type from 'name' to 'text'
                                        name="name"
                                        value={data.name}
                                        className="mt-1 block w-full"
                                        autoComplete="off" // No specific autocomplete for this example
                                        isFocused={true}
                                        onChange={handleInputChange} // Use generic handler for text inputs
                                    />
                                    <InputError message={errors.name} className="mt-2" />
                                </div>

                                <div>
                                    <InputLabel htmlFor="rut" value="RUT (sin puntos con guion)" />
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

                                <div>
                                    <InputLabel htmlFor="region" value="Selecciona una región" />
                                    <Select
                                        id="region"
                                        name="region"
                                        className="mt-1 block w-full"
                                        value={data.region}
                                        onChange={(value) => {
                                            const selectedRegion = regions.find(r => r.name === value);
                                            setSelectedRegionId(selectedRegion?.id || null);
                                            setData('region', value);
                                            setData('commune', ''); // Reset comuna al cambiar región
                                        }}
                                    >
                                        {regions.map((region) => (
                                            <Option className="mt-1 block w-full" key={region.id} value={region.name}>
                                                {region.name}
                                            </Option>
                                        ))}
                                    </Select>
                                    <InputError message={errors.region} className="mt-2" />
                                </div>

                                <div>
                                    <InputLabel htmlFor="commune" value="Selecciona una comuna" />
                                    <Select
                                        id="commune"
                                        name="commune"
                                        className="mt-1 block w-full"
                                        value={data.commune}
                                        onChange={(value) => setData('commune', value)}
                                        disabled={!selectedRegionId}
                                    >
                                        {filteredCommunes.map((commune) => (
                                            <Option className="mt-1 block w-full" key={commune.id} value={commune.name}>
                                                {commune.name}
                                            </Option>
                                        ))}
                                    </Select>
                                    <InputError message={errors.commune} className="mt-2" />
                                </div>

                                <div>
                                    <InputLabel htmlFor="address" value="Dirección" />
                                    <TextInput
                                        id="address"
                                        type="text"
                                        name="address"
                                        value={data.address}
                                        className="mt-1 block w-full"
                                        onChange={handleInputChange}
                                    />
                                    <InputError message={errors.address} className="mt-2" />
                                </div>

                                <div>
                                    <InputLabel htmlFor="phone" value="Teléfono" />
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

                                <div>
                                    <InputLabel htmlFor="start_date" value="Fecha de Inicio" />
                                    <TextInput
                                        id="start_date"
                                        type="date" // Use type="date" for date picker
                                        name="start_date"
                                        value={data.start_date}
                                        className="mt-1 block w-full"
                                        onChange={handleInputChange}
                                    />
                                    <InputError message={errors.start_date} className="mt-2" />
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