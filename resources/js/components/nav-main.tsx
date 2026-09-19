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
                    const href = item.href;
                    const isExternal =
                        typeof href === 'string' && href.startsWith('http');

                    return (
                        <SidebarMenuItem key={item.title}>
                            <SidebarMenuButton
                                asChild
                                isActive={!isExternal && isCurrentUrl(href)}
                                tooltip={{ children: item.title }}
                            >
                                {isExternal ? (
                                    <a href={href}>
                                        {item.icon && <item.icon />}
                                        <span>{item.title}</span>
                                    </a>
                                ) : (
                                    <Link href={href} prefetch>
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
