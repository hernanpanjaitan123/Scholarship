<?php
return [
    'adminEmail' => 'admin@example.com',
    'applicationID' => 'SYSTEMX-BACKEND',
    'authenticatedRoleName' => 'authenticated',
    'sidebarMenu' => [
                       
                         [
                            'label' => 'Manajemen Beasiswa',
                            'icon' => 'fa fa-user',
                            'childs' => [
                                
                                [
                                    'label' => 'Beasiswa',
                                    'url' => '/schl/beasiswa',
                                    'icon' => 'fa fa-desktop',
                                ],
                            
                            [
                                'label' => 'Donatur',
                                'url' => '/schl/donatur',
                                'icon' => 'fa fa-desktop',
                            ],
                            [
                                'label' => 'Request Beasiswa',
                                'url' => '/schl/beasiswa-mahasiswa',
                                'icon' => 'fa fa-desktop',
                            ],
                            // [
                            //     'label' => 'Pendaftar',
                            //     'url' => '/schl/pendaftaran',
                            //     'icon' => 'fa fa-desktop',
                            // ],
                            //  [
                            //     'label' => 'Syarat Beasiswa',
                            //     'url' => '/schl/syarat',
                            //     'icon' => 'fa fa-desktop',
                            // ]
                        ]
                        ],    
                	

                    ],
];
