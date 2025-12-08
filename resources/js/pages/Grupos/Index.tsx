import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Group } from '@/types/group';
import { Head, Link } from '@inertiajs/react';
import { route } from 'ziggy-js';

interface Props {
    grupos: Group[];
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Grupos',
        href: route('grupos.index'),
    },
];

export default function GroupsIndex({ grupos }: Props) {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Grupos" />
            <div className="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
                <div className="flex items-center justify-between mb-2">
                    <h1 className="text-2xl font-bold">Grupos</h1>
                    <Link
                        href={route('grupos.create')}
                        className="px-4 py-2 bg-primary text-primary-foreground rounded-lg hover:bg-primary/90 transition-colors"
                    >
                        Crear Grupo
                    </Link>
                </div>

                {grupos.length === 0 ? (
                    <div className="flex items-center justify-center min-h-[400px] rounded-xl border border-sidebar-border/70 dark:border-sidebar-border bg-white dark:bg-neutral-900">
                        <p className="text-muted-foreground">No hay grupos disponibles</p>
                    </div>
                ) : (
                    <div className="rounded-xl border border-sidebar-border/70 dark:border-sidebar-border bg-white dark:bg-neutral-900 overflow-hidden">
                        <div className="overflow-x-auto">
                            <table className="w-full">
                                <thead className="bg-muted/50 border-b border-sidebar-border/70 dark:border-sidebar-border">
                                    <tr>
                                        <th className="px-6 py-3 text-left text-sm font-semibold">Nombre</th>
                                        <th className="px-6 py-3 text-left text-sm font-semibold">Menú</th>
                                        <th className="px-6 py-3 text-left text-sm font-semibold">Llegada</th>
                                        <th className="px-6 py-3 text-left text-sm font-semibold">Salida</th>
                                        <th className="px-6 py-3 text-left text-sm font-semibold">Personas</th>
                                        <th className="px-6 py-3 text-right text-sm font-semibold">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody className="divide-y divide-sidebar-border/70 dark:divide-sidebar-border">
                                    {grupos.map((grupo) => (
                                        <tr
                                            key={grupo.id}
                                            className="hover:bg-muted/30 transition-colors"
                                        >
                                            <td className="px-6 py-4 text-sm font-medium">
                                                {grupo.nombre}
                                            </td>
                                            <td className="px-6 py-4 text-sm text-muted-foreground">
                                                {grupo.menus?.nombre || '-'}
                                            </td>
                                            <td className="px-6 py-4 text-sm text-muted-foreground">
                                                {grupo.fecha_de_llegada}
                                            </td>
                                            <td className="px-6 py-4 text-sm text-muted-foreground">
                                                {grupo.fecha_de_salida}
                                            </td>
                                            <td className="px-6 py-4 text-sm text-muted-foreground">
                                                {grupo.personas_count}
                                            </td>
                                            <td className="px-6 py-4 text-sm text-right">
                                                <div className="flex gap-2 justify-end">
                                                    <Link
                                                        href={route('grupos.show', grupo.id)}
                                                        className="px-3 py-1.5 text-xs bg-secondary text-secondary-foreground rounded-md hover:bg-secondary/80 transition-colors"
                                                    >
                                                        Ver
                                                    </Link>
                                                    <Link
                                                        href={route('grupos.edit', grupo.id)}
                                                        className="px-3 py-1.5 text-xs bg-primary text-primary-foreground rounded-md hover:bg-primary/90 transition-colors"
                                                    >
                                                        Editar
                                                    </Link>
                                                    <Link
                                                        href={route('grupos.destroy', grupo.id)}
                                                        className="px-3 py-1.5 text-xs bg-destructive text-destructive-foreground rounded-md hover:bg-destructive/80 transition-colors"
                                                    >
                                                        Eliminar
                                                    </Link>
                                                </div>
                                            </td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                        </div>
                    </div>
                )}
            </div>
        </AppLayout>
    );
}
