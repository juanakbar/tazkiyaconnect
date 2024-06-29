<x-app-layout>


    <div class="mb-5 grid grid-cols-1 gap-5 lg:grid-cols-5 xl:grid-cols-8">
        <div class="panel col-span-2">
            <div class="mb-5">
                <div class="flex flex-col items-center justify-center">
                    <img src="{{ asset("storage/" . $siswa->avatar) }}" alt="image"
                        class="mb-5 h-24 w-24 rounded-full object-cover">
                    <p class="text-xl font-semibold text-primary">{{ $siswa->name }}</p>
                </div>
                <ul class="mt-5 flex flex-col items-start space-y-4 font-semibold text-dark">
                    <li class="flex items-start gap-2">
                        Anak Dari : {{ $siswa->waliMurid->name }}
                    </li>
                    <li class="flex items-start gap-2">
                        Email Orang Tua : {{ $siswa->waliMurid->email }}
                    </li>
                    <li class="flex items-start gap-2">
                        Alamat Orang Tua : {{ $siswa->waliMurid->waliMurid->alamat }}
                    </li>
                </ul>
            </div>
        </div>
        <div class="panel lg:col-span-2 xl:col-span-3">
            <div class="mb-5">
                <h5 class="text-lg font-semibold dark:text-white-light">Task</h5>
            </div>
            <div class="mb-5">
                <div class="table-responsive font-semibold text-[#515365] dark:text-white-light">
                    <table class="whitespace-nowrap">
                        <thead>
                            <tr>
                                <th>Projects</th>
                                <th>Progress</th>
                                <th>Task Done</th>
                                <th class="text-center">Time</th>
                            </tr>
                        </thead>
                        <tbody class="dark:text-white-dark">
                            <tr>
                                <td>Figma Design</td>
                                <td>
                                    <div class="flex h-1.5 w-full rounded-full bg-[#ebedf2] dark:bg-dark/40">
                                        <div class="w-[29.56%] rounded-full bg-danger"></div>
                                    </div>
                                </td>
                                <td class="text-danger">29.56%</td>
                                <td class="text-center">2 mins ago</td>
                            </tr>
                            <tr>
                                <td>Vue Migration</td>
                                <td>
                                    <div class="flex h-1.5 w-full rounded-full bg-[#ebedf2] dark:bg-dark/40">
                                        <div class="w-1/2 rounded-full bg-info"></div>
                                    </div>
                                </td>
                                <td class="text-success">50%</td>
                                <td class="text-center">4 hrs ago</td>
                            </tr>
                            <tr>
                                <td>Flutter App</td>
                                <td>
                                    <div class="flex h-1.5 w-full rounded-full bg-[#ebedf2] dark:bg-dark/40">
                                        <div class="w-[39%] rounded-full bg-warning"></div>
                                    </div>
                                </td>
                                <td class="text-danger">39%</td>
                                <td class="text-center">a min ago</td>
                            </tr>
                            <tr>
                                <td>API Integration</td>
                                <td>
                                    <div class="flex h-1.5 w-full rounded-full bg-[#ebedf2] dark:bg-dark/40">
                                        <div class="w-[78.03%] rounded-full bg-success"></div>
                                    </div>
                                </td>
                                <td class="text-success">78.03%</td>
                                <td class="text-center">2 weeks ago</td>
                            </tr>

                            <tr>
                                <td>Blog Update</td>
                                <td>
                                    <div class="flex h-1.5 w-full rounded-full bg-[#ebedf2] dark:bg-dark/40">
                                        <div class="w-full rounded-full bg-secondary"></div>
                                    </div>
                                </td>
                                <td class="text-success">100%</td>
                                <td class="text-center">18 hrs ago</td>
                            </tr>
                            <tr>
                                <td>Landing Page</td>
                                <td>
                                    <div class="flex h-1.5 w-full rounded-full bg-[#ebedf2] dark:bg-dark/40">
                                        <div class="w-[19.15%] rounded-full bg-danger"></div>
                                    </div>
                                </td>
                                <td class="text-danger">19.15%</td>
                                <td class="text-center">5 days ago</td>
                            </tr>
                            <tr>
                                <td>Shopify Dev</td>
                                <td>
                                    <div class="flex h-1.5 w-full rounded-full bg-[#ebedf2] dark:bg-dark/40">
                                        <div class="w-[60.55%] rounded-full bg-primary"></div>
                                    </div>
                                </td>
                                <td class="text-success">60.55%</td>
                                <td class="text-center">8 days ago</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
