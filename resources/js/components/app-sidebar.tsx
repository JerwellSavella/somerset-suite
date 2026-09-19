import { Link, usePage } from '@inertiajs/react';
import { AppWindow, LayoutGrid } from 'lucide-react';
import AppLogo from '@/components/app-logo';
import { NavMain } from '@/components/nav-main';
import { NavUser } from '@/components/nav-user';
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from '@/components/ui/sidebar';
import { dashboard } from '@/routes';
import type { NavItem } from '@/types';

type AccessibleSystem = {
    id: number;
    sys_code: string;
    sys_name: string;
    sys_desc: string | null;
    sys_link: string;
    sys_type: string | null;
    is_sso: number;
};

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: dashboard(),
        icon: LayoutGrid,
    },
];

export function AppSidebar() {
    const { accessibleSystems } = usePage().props as {
        accessibleSystems: AccessibleSystem[];
    };

    const systemNavItems: NavItem[] = (accessibleSystems ?? []).map((system) => ({
        title: system.sys_name,
        href: system.is_sso
            ? `${window.location.origin}/sso/launch/${system.id}`
            : system.sys_link,
        icon: AppWindow,
    }));

    const navItems = [...mainNavItems, ...systemNavItems];

    return (
        <Sidebar collapsible="icon" variant="inset">
            <SidebarHeader>
                <SidebarMenu>
                    <SidebarMenuItem>
                        <SidebarMenuButton size="lg" asChild>
                            <Link href={dashboard()} prefetch>
                                <AppLogo />
                            </Link>
                        </SidebarMenuButton>
                    </SidebarMenuItem>
                </SidebarMenu>
            </SidebarHeader>
            <SidebarContent>
                <NavMain items={navItems} />
            </SidebarContent>
            <SidebarFooter>
                <NavUser />
            </SidebarFooter>
        </Sidebar>
    );
}
