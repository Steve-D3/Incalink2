import GroupForm from "@/components/Forms/GroupForm";
import { Group, Menu } from "@/types/group";

interface Props {
    grupo: Group;
    menus: Menu[];
}

export default function GroupsEdit({ grupo, menus }: Props) {
    return (
        <div className="p-6 max-w-lg mx-auto">
            <h1 className="text-2xl font-bold mb-4">Edit Group</h1>
            <GroupForm grupo={grupo} menus={menus} />
        </div>
    );
}
