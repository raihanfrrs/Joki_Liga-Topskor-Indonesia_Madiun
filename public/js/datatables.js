$(document).ready(function () {
    $('#dataClubs').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/dataClubs',
        columns: [
            { data: 'id', name: 'id', class: 'text-muted text-center' },
            { data: 'name', name: 'name', class: 'text-muted text-capitalize' },
            { data: 'address', name: 'address', class: 'text-muted text-center' },
            { data: 'phone', name: 'phone', class: 'text-muted text-center' },
            { data: 'club_manager', name: 'club_manager', class: 'text-muted text-center' },
            { data: 'zone', name: 'zone', class: 'text-muted text-center' },
            { data: 'action', name: 'action', class: 'text-center' }
        ]
    });

    $('#dataPlayers').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/dataPlayers',
        columns: [
            { data: 'id', name: 'id', class: 'text-muted text-center' },
            { data: 'name', name: 'name', class: 'text-muted text-capitalize' },
            { data: 'club', name: 'club', class: 'text-muted text-center' },
            { data: 'nik', name: 'nik', class: 'text-muted text-center' },
            { data: 'nisn', name: 'nisn', class: 'text-muted text-center' },
            { data: 'phone', name: 'phone', class: 'text-muted text-center' },
            { data: 'birthPlace', name: 'birthPlace', class: 'text-muted text-center' },
            { data: 'birthDate', name: 'birthDate', class: 'text-muted text-center' },
            { data: 'zone', name: 'zone', class: 'text-muted text-center' },
            { data: 'address', name: 'address', class: 'text-muted text-center' },
            { data: 'position', name: 'position', class: 'text-muted text-center' },
            { data: 'action', name: 'action', class: 'text-center' }
        ]
    });

    $('#dataAgeGroups').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/dataAgeGroups',
        columns: [
            { data: 'id', name: 'id', class: 'text-muted text-center' },
            { data: 'age', name: 'age', class: 'text-muted text-center' },
            { data: 'amount', name: 'amount', class: 'text-muted text-center' },
            { data: 'action', name: 'action', class: 'text-center' }
        ]
    });

    $('#dataZones').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/dataZones',
        columns: [
            { data: 'id', name: 'id', class: 'text-muted text-center' },
            { data: 'zone', name: 'zone', class: 'text-muted text-center' },
            { data: 'group', name: 'group', class: 'text-muted text-center' },
            { data: 'action', name: 'action', class: 'text-center' }
        ]
    });
});