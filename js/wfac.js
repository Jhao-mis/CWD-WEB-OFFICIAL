const data = [
            ["1", "Bucal", "Bucal Main", "Spring", "3312", "Chlorination w/ UV & Filter", "Concrete & Steel"],
            ["2", "Bucal", "Bucal Intake", "Spring", "160", "UV & Filter", ""],
            ["3", "Banadero", "Banadero", "Deepwell", "46", "Chlorination", ""],
            ["4", "Banadero", "Bria P1", "Deepwell", "46", "Chlorination", "Above-Ground Steel"],
            ["5", "Banadero", "Bria P2", "Deepwell", "46", "", ""],
            ["6", "Banlic", "Don Jose Homes", "Deepwell", "30", "Chlorination w/ Filter", ""],
            ["7", "Banlic", "Villa Palao P1", "Deepwell", "35", "Chlorination w/ UV & Filter", "Elevated Steel"],
            ["8", "Banlic", "Villa Palao P2", "Deepwell", "35", "Chlorination w/ UV & Filter", "Elevated Steel"],
            ["9", "Barandal", "Barandal", "Deepwell", "17", "Chlorination", ""],
            ["10", "Barangay 1", "Crossing", "Deepwell", "160", "Chlorination w/ UV & Filter", ""],
            ["11", "Bubuyan", "Bubuyan", "Deepwell", "17", "Chlorination", ""],
            ["12", "Bucal", "Lakeview Heights", "Deepwell", "8", "Chlorination", "Elevated Steel"],
            ["13", "Bucal", "Tierra Hermosa", "Deepwell", "30", "UV & Filter", "Elevated Steel"],
            ["14", "Bunggo", "Bunggo P1", "Deepwell", "6", "", ""],
            ["15", "Bunggo", "Bunggo P2", "Deepwell", "6", "", ""],
            ["16", "Bunggo", "Bunggo P3", "Deepwell", "6", "", ""],
            ["17", "Bunggo", "Bunggo P4", "Deepwell", "17", "Chlorination", ""],
            ["18", "Canlubang", "Asiacon P1", "Deepwell", "12", "Chlorination", "Elevated Steel"],
            ["19", "Canlubang", "Asiacon P2", "Deepwell", "46", "Chlorination", "Elevated Steel"],
            ["20", "Canlubang", "Asiacon 2", "Deepwell", "46", "Chlorination w/ Filter", "Elevated Steel"],
            ["21", "Canlubang", "Majada In", "Deepwell", "68", "Chlorination", "Elevated Steel"],
            ["22", "Canlubang", "Majada In-GK", "Deepwell", "8", "", "Elevated Steel"],
            ["23", "Canlubang", "Manfil", "Deepwell", "46", "Chlorination", "Elevated Steel"],
            ["24", "Canlubang", "MCDC P1", "Deepwell", "46", "Chlorination", "Elevated Steel"],
            ["25", "Canlubang", "MCDC P2", "Deepwell", "46", "Chlorination", "Elevated Steel"],
            ["26", "Canlubang", "Palao P1", "Deepwell", "30", "Chlorination", "Elevated Steel"],
            ["27", "Canlubang", "Palao P2", "Deepwell", "30", "Chlorination", "Elevated Steel"],
            ["28", "Halang", "Dispatching", "Deepwell", "95", "Chlorination w/ UV & Filter", ""],
            ["29", "Hornalan", "Hornalan P2", "Deepwell", "3", "", "Elevated Steel"],
            ["30", "Hornalan", "Hornalan P3", "Deepwell", "17", "", "Elevated Steel"],
            ["31", "Kay-Anlog", "Southville P1", "Deepwell", "52", "Chlorination", "Elevated Steel"],
            ["32", "Kay-Anlog", "Southville P2", "Deepwell", "52", "Chlorination", "Elevated Steel"],
            ["33", "Kay-Anlog", "Southville P3", "Deepwell", "52", "Chlorination", ""],
            ["34", "La Mesa", "Villa de Calamba", "Deepwell", "46", "Chlorination w/ UV & Filter", "Above-Ground Concrete"],
            ["35", "La Mesa", "Pasong Kalabaw", "Deepwell", "46", "Chlorination w/ UV & Filter", ""],
            ["36", "Laguerta", "Gumamela Homes", "Deepwell", "3", "", "Above-Ground Steel"],
            ["37", "Lawa", "Don Abelardo Homes", "Deepwell", "55", "", ""],
            ["38", "Lawa", "Lawa", "Deepwell", "77", "Chlorination w/ UV & Filter", ""],
            ["39", "Lawa", "Rodriguez Village", "Deepwell", "30", "Chlorination", ""],
            ["40", "Lingga", "LE Village", "Deepwell", "30", "", ""],
            ["41", "Looc", "Aztec", "Deepwell", "12", "Chlorination", "Elevated Steel"],
            ["42", "Looc", "Calambeno Ville", "Deepwell", "12", "", "Elevated Steel"],
            ["43", "Looc", "Villa Consolacion", "Deepwell", "5", "Chlorination w/ UV & Filter", "Elevated Steel"],
            ["44", "Makiling", "Ciudad Verde", "Deepwell", "68", "Chlorination", "Elevated Steel"],
            ["45", "Makiling", "Makiling", "Deepwell", "30", "Chlorination", ""],
            ["46", "Makiling", "Palacio Real", "Deepwell", "38", "Chlorination", "Elevated Steel"],
            ["47", "Makiling", "Woodlands", "Deepwell", "17", "", "Elevated Steel"],
            ["48", "Maunong", "Maunong P2", "Deepwell", "5", "", "Elevated Steel"],
            ["49", "Maunong", "Maunong P3", "Deepwell", "68", "Chlorination", ""],
            ["50", "Mayapa", "St. Christoper", "Deepwell", "68", "Chlorination", ""],
            ["51", "Milagrosa", "Glenwood", "Deepwell", "36", "Chlorination", "Elevated Steel"],
            ["52", "Milagrosa", "Homelands", "Deepwell", "68", "Chlorination", "Elevated Steel"],
            ["53", "Milagrosa", "Milagrosa", "Deepwell", "60", "Chlorination", ""],
            ["54", "Palo Alto", "Maresco", "Deepwell", "17", "Chlorination", "Elevated Steel"],
            ["55", "Palo Alto", "Mountain View", "Deepwell", "14", "Chlorination", "Elevated Steel"],
            ["56", "Palo Alto", "Palo Alto", "Deepwell", "9", "", "Elevated Steel"],
            ["57", "Pansol", "Laguna Hills", "Deepwell", "30", "", "Elevated Steel"],
            ["58", "Parian", "Landmark P1", "Deepwell", "160", "Chlorination w/ UV & Filter", ""],
            ["59", "Parian", "Landmark P2", "Deepwell", "160", "Chlorination", "Above-Ground Steel"],
            ["60", "Parian", "Marcville", "Deepwell", "77", "Chlorination", ""],
            ["61", "Prinza", "Villa La Prinza P1", "Deepwell", "9", "Chlorination", "Elevated Steel"],
            ["62", "Prinza", "Villa La Prinza P2", "Deepwell", "9", "", "Elevated Steel"],
            ["63", "Prinza", "Villa La Prinza P3", "Deepwell", "30", "", ""],
            ["64", "Punta", "Punta", "Deepwell", "30", "Chlorination", ""],
            ["65", "Real", "Calamba Heights", "Deepwell", "46", "", ""],
            ["66", "Real", "Bria P2", "Deepwell", "38", "UV & Filter", ""],
            ["67", "Saimsim", "Saimsim", "Deepwell", "17", "", "Elevated Steel"],
            ["68", "San Cristobal", "Garden Homes", "Deepwell", "8", "Chlorination w/ UV & Filter", "Elevated Steel"],
            ["69", "Sirang Lupa", "Major Homes", "Deepwell", "14", "Chlorination", "Elevated Steel"],
            ["70", "Sirang Lupa", "North Marie", "Deepwell", "30", "Chlorination", "Elevated Steel"],
            ["71", "Sirang Lupa", "Sirang Lupa P1", "Deepwell", "60", "Chlorination", ""],
            ["72", "Sirang Lupa", "Sirang Lupa P2", "Deepwell", "36", "Chlorination", ""],
            ["73", "Sirang Lupa", "Tibagan", "Deepwell", "5", "", "Elevated Steel"],
            ["74", "Turbina", "Turbina P1", "Deepwell", "6", "", "Elevated Steel"],
            ["75", "Turbina", "Turbina P2", "Deepwell", "20", "", "Elevated Steel"],
            ["76", "Ulango", "Ulango P1", "Deepwell", "3", "", "Above-Ground Steel"],
            ["77", "Ulango", "Ulango P2", "Deepwell", "5", "", "Above-Ground Steel"]
        ];

        const tableBody = document.getElementById('tableBody');
        const noResults = document.getElementById('noResults');

        function populateTable(filteredData) {
            if (filteredData.length === 0) {
                tableBody.innerHTML = '';
                noResults.classList.remove('hidden');
                return;
            }
            
            noResults.classList.add('hidden');
            tableBody.innerHTML = filteredData.map(row => `
                <tr class="hover:bg-blue-50/50 transition-colors group">
                    <td class="p-4 text-slate-400 font-mono text-[10px]">${row[0]}</td>
                    <td class="p-4">
                        <span class="font-bold text-slate-800">${row[1]}</span>
                    </td>
                    <td class="p-4">
                        <span class="font-semibold text-blue-700 group-hover:text-blue-600">${row[2]}</span>
                    </td>
                    <td class="p-4">
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium ${row[3] === 'Spring' ? 'bg-cyan-50 text-cyan-700' : 'bg-slate-100 text-slate-600'}">
                            ${row[3]}
                        </span>
                    </td>
                    <td class="p-4 text-center font-bold text-slate-700">${row[4]}</td>
                    <td class="p-4">
                        ${row[5] ? `<span class="inline-flex items-center gap-1.5 text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-full text-xs font-medium border border-emerald-100">
                            <svg class="h-1.5 w-1.5 fill-emerald-500" viewBox="0 0 6 6"><circle cx="3" cy="3" r="3" /></svg>
                            ${row[5]}
                        </span>` : '<span class="text-slate-300 italic text-xs">None</span>'}
                    </td>
                    <td class="p-4">
                        ${row[6] ? `<span class="text-slate-600 text-xs flex items-center gap-2">
                            <svg class="h-3 w-3 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                            ${row[6]}
                        </span>` : '<span class="text-slate-300">—</span>'}
                    </td>
                </tr>
            `).join('');
        }

        function filterTable() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toLowerCase();
            const filteredData = data.filter(row => 
                row[1].toLowerCase().includes(filter) || 
                row[2].toLowerCase().includes(filter) ||
                row[3].toLowerCase().includes(filter)
            );
            populateTable(filteredData);
        }

        // Initial Load
        window.onload = () => populateTable(data);