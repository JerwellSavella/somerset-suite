import { Link } from '@inertiajs/react';
import {
    SidebarGroup,
    SidebarGroupLabel,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from '@/components/ui/sidebar';
import { useCurrentUrl } from '@/hooks/use-current-url';
import type { NavItem } from '@/types';

export function NavMain({ items = [] }: { items: NavItem[] }) {
    const { isCurrentUrl } = useCurrentUrl();

    return (
        <SidebarGroup className="px-2 py-0">
            <SidebarGroupLabel>Explorer</SidebarGroupLabel>
            <SidebarMenu>
                {items.map((item) => {
                    const isExternal =
                        typeof item.href === 'string' &&
                        item.href.startsWith('http');

                    return (
                        <SidebarMenuItem key={item.title}>
                            <SidebarMenuButton
                                asChild
                                isActive={
                                    !isExternal && isCurrentUrl(item.href)
                                }
                                tooltip={{ children: item.title }}
                            >
                                {isExternal ? (
                                    <a href={item.href}>
                                        {item.icon && <item.icon />}
                                        <span>{item.title}</span>
                                    </a>
                                ) : (
                                    <Link href={item.href} prefetch>
                                        {item.icon && <item.icon />}
                                        <span>{item.title}</span>
                                    </Link>
                                )}
                            </SidebarMenuButton>
                        </SidebarMenuItem>
                    );
                })}
            </SidebarMenu>
        </SidebarGroup>
    );
}
