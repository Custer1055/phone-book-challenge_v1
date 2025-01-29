export interface Contact {
    id: number;
    user_id: number;
    name: string;
    email: string;
    phone: string;
    created_at: string;
    updated_at: string;
}

export interface ContactsResponse {
    data: Contact[];
}