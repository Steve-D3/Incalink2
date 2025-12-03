interface Group {
    id: string;
    nombre: string;
    fecha_de_llegada: string;
    fecha_de_salida: string;
    personas_count: number;
}

interface Props {
    grupos: Group[];
}

export default function GroupsIndex({ grupos }: Props) {
    return (
        <div className="p-6">
            <h1 className="text-3xl font-bold mb-4">Groups</h1>

            <div className="space-y-4">
                {grupos.map(grupo => (
                    <div
                        key={grupo.id}
                        className="p-4 border rounded-lg shadow"
                    >
                        <h2 className="text-xl font-semibold">{grupo.nombre}</h2>

                        <p className="text-gray-600 color-black">
                            Arrival: {grupo.fecha_de_llegada}
                        </p>

                        <p className="text-gray-600 color-black">
                            Departure: {grupo.fecha_de_salida}
                        </p>

                        <p className="mt-2 font-medium color-black">
                            Total persons: {grupo.personas_count}
                        </p>
                    </div>
                ))}
            </div>
        </div>
    );
}
