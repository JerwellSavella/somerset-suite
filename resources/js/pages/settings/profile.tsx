import { Head, usePage } from '@inertiajs/react';
import Heading from '@/components/heading';
import { edit } from '@/routes/profile';

type Profile = {
    first_name: string;
    last_name: string;
    middle_name: string;
    suffix: string | null;
    birth_date: string | null;
    baptism_date: string | null;
    email_add: string;
    phone_num: string;
    gender_desc: string;
    role_desc: string;
    status_desc: string;
    remarks_desc: string;
    user_type_desc: string;
    group_num: number;
};

type PageProps = {
    profile: Profile;
    age: number | null;
};

function formatDate(date: string | null) {
    if (!date) {
        return '—';
    }

    return new Date(date).toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
    });
}

function InfoRow({
    label,
    value,
}: {
    label: string;
    value: string | number | null;
}) {
    return (
        <div className="flex flex-col gap-1 border-b border-sidebar-border/70 py-3 last:border-b-0 sm:flex-row sm:items-center sm:justify-between dark:border-sidebar-border">
            <span className="text-sm text-muted-foreground">{label}</span>
            <span className="text-sm font-medium">{value ?? '—'}</span>
        </div>
    );
}

export default function Profile() {
    const { profile, age } = usePage<PageProps>().props;

    const fullName = [
        profile.first_name,
        profile.middle_name,
        profile.last_name,
        profile.suffix,
    ]
        .filter(Boolean)
        .join(' ');

    return (
        <>
            <Head title="Profile settings" />
            <h1 className="sr-only">Profile settings</h1>
            <div className="mx-auto max-w-2xl space-y-6">
                <Heading
                    variant="small"
                    title="Profile"
                    description="Your account information"
                />

                <div className="rounded-xl border border-sidebar-border/70 p-6 dark:border-sidebar-border">
                    <h2 className="mb-4 text-lg font-semibold">{fullName}</h2>
                    <div className="grid gap-0">
                        <InfoRow label="Email" value={profile.email_add} />
                        <InfoRow
                            label="Phone Number"
                            value={profile.phone_num}
                        />
                        <InfoRow
                            label="Date of Birth"
                            value={formatDate(profile.birth_date)}
                        />
                        <InfoRow label="Age" value={age} />
                        <InfoRow
                            label="Date of Baptism"
                            value={formatDate(profile.baptism_date)}
                        />
                        <InfoRow label="Gender" value={profile.gender_desc} />
                        <InfoRow label="Role" value={profile.role_desc} />
                        <InfoRow label="Status" value={profile.status_desc} />
                        <InfoRow label="Remarks" value={profile.remarks_desc} />
                        <InfoRow
                            label="User Type"
                            value={profile.user_type_desc}
                        />
                        <InfoRow label="Group" value={profile.group_num} />
                    </div>
                </div>
            </div>
        </>
    );
}

Profile.layout = {
    breadcrumbs: [
        {
            title: 'Profile settings',
            href: edit(),
        },
    ],
};
