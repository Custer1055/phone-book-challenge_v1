export interface TableAction {
    label: string,
    icon: string,
    action: (row: any) => void;
}