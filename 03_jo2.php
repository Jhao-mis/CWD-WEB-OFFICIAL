<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CWD Career Opportunities</title>
    <link rel="icon" type="image/x-icon" href="./img/CWDIcon.png" />

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/navtwnew.css">
    <link rel="stylesheet" href="./css/ind.css">
    <link rel="stylesheet" href="./css/jo.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --cwd-blue: #1a589e;
            --cwd-dark: #0f172a;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f8fafc;
        }

        .jo-table-container {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 4px 20px -5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border: 1px solid #e2e8f0;
        }

        .jo-table thead {
            background: var(--cwd-blue);
            color: white;
        }

        .jo-table th {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 1.25rem 1rem;
            font-weight: 700;
        }

        .jo-table td {
            padding: 1.25rem 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
            font-size: 0.9rem;
            color: #334155;
        }

        .step-circle {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--cwd-blue);
            color: white;
            border-radius: 50%;
            font-weight: 800;
            font-size: 0.8rem;
            flex-shrink: 0;
        }

        .requirement-card {
            background: white;
            padding: 1.25rem;
            border-radius: 0.75rem;
            border-left: 4px solid var(--cwd-blue);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
            transition: transform 0.2s;
        }

        .requirement-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem;
            border-radius: 0.5rem;
            transition: all 0.2s;
            color: var(--cwd-blue);
        }

        .action-btn:hover {
            background-color: #eff6ff;
            color: #1e40af;
        }

        .cta-gradient {
            background: linear-gradient(135deg, #1a589e 0%, #1e40af 100%);
        }
    </style>


</head>

<body>

    <?php include 'includes/navigation.php'; ?>

    <div class="max-w-6xl mx-auto px-4 pt-12 pb-20">

        <!-- Header -->
        <div class="mb-12 text-center md:text-left">
            <h1 class="text-4xl md:text-5xl font-black text-[#1a589e] mb-4">Careers at <span
                    class="text-slate-800">CWD</span></h1>
            <p class="text-slate-500 max-w-2xl font-medium leading-relaxed">
                Join a team dedicated to providing sustainable water services to the community. Explore our current job
                openings and start your professional journey with us.
            </p>
        </div>

        <!-- Job Openings Table (New Column Structure) -->
        <div class="space-y-4 mb-20">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-1 bg-blue-600 rounded-full"></div>
                <h2 class="text-xl font-bold text-slate-800 uppercase tracking-tight">Current Vacancies</h2>
            </div>

            <div class="jo-table-container">
                <div class="overflow-x-auto">

                    <table class="jo-table w-full border-collapse">
                        <thead>
                            <tr>
                                <th class="text-left w-2/4">Plantilla Publication</th>
                                <th class="text-center w-1/4">Publication Date</th>
                                <th class="text-center w-1/4">Action (View & Download)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Example Row 1 -->
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="py-5">
                                    <div class="flex flex-col">
                                        <span class="font-bold text-slate-900 text-base">Driver</span>
                                        <span class="text-xs text-slate-500 font-medium">Item No. 84 • Salary Grade
                                            4</span>
                                        <p class="text-[11px] text-slate-400 mt-1 max-w-md">Elementary School Graduate;
                                            Driver's License (MC 11, s.96-Cat. II)</p>
                                    </div>
                                </td>
                                <td class="text-center font-semibold text-slate-600">
                                    Oct 15, 2023
                                </td>
                                <td class="text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="#" class="action-btn" title="View Details">
                                            <i class="fa-solid fa-eye text-lg"></i>
                                        </a>
                                        <div class="w-[1px] h-4 bg-slate-200"></div>
                                        <a href="#" class="action-btn" title="Download PDF">
                                            <i class="fa-solid fa-file-arrow-down text-lg"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <!-- Example Row 2 -->
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="py-5">
                                    <div class="flex flex-col">
                                        <span class="font-bold text-slate-900 text-base">Utility Worker B</span>
                                        <span class="text-xs text-slate-500 font-medium">Item No. 85 • Salary Grade
                                            1</span>
                                        <p class="text-[11px] text-slate-400 mt-1 max-w-md">Must be able to read and
                                            write; None required (MC 11, s.96-Cat. III)</p>
                                    </div>
                                </td>
                                <td class="text-center font-semibold text-slate-600">
                                    Oct 15, 2023
                                </td>
                                <td class="text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="#" class="action-btn" title="View Details">
                                            <i class="fa-solid fa-eye text-lg"></i>
                                        </a>
                                        <div class="w-[1px] h-4 bg-slate-200"></div>
                                        <a href="#" class="action-btn" title="Download PDF">
                                            <i class="fa-solid fa-file-arrow-down text-lg"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            
            <p class="text-[11px] text-slate-400 italic">** All positions are subject to Civil Service Commission (CSC)
                rules and regulations.</p>
        </div>

        <!-- Application Instructions -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            <div class="lg:col-span-2 space-y-8">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-1 bg-blue-600 rounded-full"></div>
                    <h2 class="text-xl font-bold text-slate-800 uppercase tracking-tight">How to Apply</h2>
                </div>

                <div class="space-y-6">
                    <div class="flex gap-5">
                        <div class="step-circle">1</div>
                        <div>
                            <h4 class="font-bold text-slate-800 mb-2">Write Application Letter</h4>
                            <p class="text-sm text-slate-600 leading-relaxed mb-3">Interested and qualified applicants
                                should signify their interest in writing through an application letter.</p>

                            <div class="flex gap-4">
                                <div class="bg-slate-100 p-4 rounded-lg border-l-4 border-slate-300 w-1/2">
                                    <p class="text-xs text-slate-500 mb-2">The application letter must include:</p>
                                    <p class="text-sm font-bold text-slate-700"> ● Position / Title</p>
                                    <p class="text-sm font-bold text-slate-700"> ● Salary Grade (SG)</p>
                                    <p class="text-sm font-bold text-slate-700"> ● Item Number</p>

                                </div>

                                <div class="bg-slate-100 p-4 rounded-lg border-l-4 border-slate-300 w-1/2">
                                    <p class="text-xs text-slate-500 mb-2">The application letter should be adressed to:
                                    </p>
                                    <p class="text-sm font-bold text-slate-700">MR. EXEQUIEL A. AGUILAR, JR.</p>
                                    <p class="text-xs text-slate-500">General Manager, Calamba Water District</p>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="flex gap-5">
                        <div class="step-circle">2</div>
                        <div>
                            <h4 class="font-bold text-slate-800 mb-2">Prepare the Requirements</h4>
                            <p class="text-sm text-slate-600 leading-relaxed mb-3">All Supporting documents and
                                requirements must be attached to the application letter.
                                Refer to the list on the right.
                            </p>
                            <div class="bg-slate-100 p-4 rounded-lg border-l-4 border-slate-300 w-1/2">
                                <p class="text-xs text-slate-500 mb-2">Applicant must fill-up the Personal Data Sheet
                                    (CSC-Form 212 Revision 2025) as well.</p>
                                <div class="pt-4">
                                    <a href="https://csc.gov.ph/downloads/category/540-csc-form-212-revised-2025-personal-data-sheet?download=3404:cs-form-no-212-revised-2025-personal-data-sheet"
                                        target="_blank"
                                        class="cta-gradient w-full flex items-center justify-center gap-3 py-2 rounded-xl text-white font-bold text-sm shadow-lg shadow-blue-200 hover:scale-[1.02] transition-transform">
                                        <span>Download PDS Form</span>
                                        <i class="fa-solid fa-file-arrow-down text-lg"></i>
                                    </a>
                                </div>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="flex gap-5">
                        <div class="step-circle">3</div>
                        <div>
                            <h4 class="font-bold text-slate-800 mb-2">Submit Application</h4>
                            <p class="text-sm text-slate-600 leading-relaxed mb-3">Ensure the completeness of your support
                                documents as <span class="text-sm text-lg text-red-600 pl-1">incomplete support
                                    documents will not be accepted.</span> 
                            </p>

                            <div class="bg-slate-100 p-4 rounded-lg border-l-4 border-slate-300 w-full">
                                    <p class="text-xs text-slate-500 mb-2">Your application must be submitted to:
                                    </p>
                                    <p class="text-sm font-bold text-slate-700 mb-2">CWD Administrative Department - Human Resources Division</p>
                                    <p class="text-xs text-slate-500">2nd Flr., CWD Main Office, Lakeview Subdv., Halang, Calamba City</p>
                                    </p>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="bg-amber-50 border border-amber-200 p-5 rounded-xl flex gap-4">
                    <i class="fa-solid fa-circle-exclamation text-amber-500 mt-1 text-lg"></i>
                    <p class="text-xs text-amber-800 leading-relaxed">
                        <strong>Equal Opportunity Policy:</strong> Calamba Water District highly encourages all
                        interested and qualified applicants including persons with disability (PWD), members of
                        indigenous communities and those from any sexual orientation and gender identities & and expression (SOGIE) to
                        apply.
                    </p>
                </div>
            </div>

            <!-- Requirements Column -->
            <div class="space-y-6">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-8 h-1 bg-blue-600 rounded-full"></div>
                    <h2 class="text-lg font-bold text-slate-800 uppercase tracking-tight">Requirements</h2>
                </div>

                <div class="space-y-3">
                    <div class="requirement-card">
                        <p class="text-xs font-bold text-blue-600 uppercase mb-1">Personal Data Sheet: CSC Form 212</p>
                        <p class="text-sm text-slate-700 font-medium">Fully Accomplished Personal Data Sheet (PDS) with
                            recent passport-sized picture (CSC-Form 212 Revision 2017).</p>
                    </div>

                    <div class="requirement-card">
                        <p class="text-xs font-bold text-blue-600 uppercase mb-1">Performance Rating</p>
                        <p class="text-sm text-slate-700 font-medium">Performance rating in the last rating period (if
                            applicable).</p>
                    </div>

                    <div class="requirement-card">
                        <p class="text-xs font-bold text-blue-600 uppercase mb-1">Birth Certificate</p>
                        <p class="text-sm text-slate-700 font-medium">Original/Authenticated Certificate of Live Birth
                            issued by the Philippine Statistics Authority (PSA)</p>
                    </div>

                    <div class="requirement-card">
                        <p class="text-xs font-bold text-blue-600 uppercase mb-1">Diploma or Transcript of Records</p>
                        <p class="text-sm text-slate-700 font-medium">Original/Authenticated Diploma/Transcript of Records</p>
                    </div>

                    <div class="requirement-card">
                        <p class="text-xs font-bold text-blue-600 uppercase mb-1">Eligibility or License ID</p>
                        <p class="text-sm text-slate-700 font-medium">Photocopy of certificate of
                            eligibility/rating/license.</p>
                    </div>

                    <div class="requirement-card">
                        <p class="text-xs font-bold text-blue-600 uppercase mb-1">Trainings & Awards</p>
                        <p class="text-sm text-slate-700 font-medium">Original Certificate(s) of Trainings Completion and Awards received, if any.</p>
                    </div>

                    <div class="requirement-card">
                        <p class="text-xs font-bold text-blue-600 uppercase mb-1">Service Record</p>
                        <p class="text-sm text-slate-700 font-medium">Authenticated Service Record for non-employees of Calamba Water District.</p>
                    </div>
                </div>

            </div>

        </div>
        
    </div>

    <?php include 'includes/backtotop.php'; ?>
    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>


</body>

</html>