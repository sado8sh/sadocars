<style>
    /* Table Styling */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    background-color: #1a1a1a; /* Dark background */
    color: #e6e6e6; /* Light text */
    font-family: Arial, sans-serif;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Subtle shadow */
    border-radius: 10px; /* Rounded corners */
    overflow: hidden; /* Ensures rounded corners are visible */
}

/* Table Header */
thead {
    background-color: #ffcc00; /* Yellow header */
    color: #1a1a1a; /* Dark text */
}

thead th {
    padding: 15px;
    text-align: left;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 0.9em;
    letter-spacing: 1px;
}

/* Table Body */
tbody tr {
    border-bottom: 1px solid #333; /* Subtle border between rows */
    transition: background-color 0.3s ease;
}

tbody tr:last-child {
    border-bottom: none; /* Remove border from last row */
}

tbody tr:hover {
    background-color: #333; /* Darker background on hover */
}

tbody td {
    padding: 12px 15px;
    font-size: 0.9em;
}

/* Alternating Row Colors */
tbody tr:nth-child(odd) {
    background-color: #262626; /* Slightly lighter dark for odd rows */
}

tbody tr:nth-child(even) {
    background-color: #1a1a1a; /* Dark for even rows */
}

/* Responsive Table */
@media (max-width: 768px) {
    table {
        display: block;
        overflow-x: auto; /* Horizontal scroll for small screens */
    }

    thead, tbody, th, td, tr {
        display: block;
    }

    thead {
        position: absolute;
        top: -9999px;
        left: -9999px;
    }

    tr {
        border: 1px solid #333;
        margin-bottom: 10px;
    }

    td {
        border: none;
        position: relative;
        padding-left: 50%;
        text-align: right;
    }

    td::before {
        content: attr(data-label);
        position: absolute;
        left: 10px;
        width: 45%;
        padding-right: 10px;
        text-align: left;
        font-weight: bold;
        color: #ffcc00; /* Yellow for labels */
    }
}
</style>

{{-- Removed direct DB query: <?php $users = DB::table('users')->get(); ?> --}}
{{-- The $users variable is passed from the admin/dashboard route closure --}}

@if(isset($users) && $users->count() > 0)
    <table>
        <thead>
            <tr>
                <th>Email</th>
                <th>Role</th>
                {{-- *** Added new column headers *** --}}
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                {{-- Removed the "Actions" header: <th>Actions</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td data-label="Email">{{ $user->email }}</td>
                    <td data-label="Role">{{ $user->role ?? 'N/A' }}</td>
                    {{-- *** Added new data cells for user info *** --}}
                    <td data-label="First Name">{{ $user->userInfo->first_name ?? 'N/A' }}</td>
                    <td data-label="Last Name">{{ $user->userInfo->last_name ?? 'N/A' }}</td>
                    <td data-label="Phone">{{ $user->userInfo->phone ?? 'Not provided' }}</td>
                    {{-- Removed the "Actions" data cell: --}}
                    {{-- <td data-label="Actions">
                        @if ($user->role === 'user')
                             <a href="{{ route('admin.users.show', $user) }}" class="link-take-a-look">
                                Take a look
                            </a>
                        @endif
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
@else
     <p style="color: #cccccc; text-align: center; width: 100%;">No users found.</p>
@endif