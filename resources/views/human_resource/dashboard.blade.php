@extends('layouts.human_resource_master')
@section('title')
    {{ __(' Human Resource dashboard') }}
@endsection
@section('content')
    <div class="content-wrapper">

        <style>
            .teacher-data-card1:hover {
                background-color: #abff4f;
                transition: background-color 0.7s;
            }

            .teacher-data-card2:hover {
                background-color: #08bdbd;
                transition: background-color 0.7s;
            }

            .teacher-data-card3:hover {
                background-color: #f21b3f;
                transition: background-color 0.7s;
            }

            .teacher-data-card4:hover {
                background-color: #ff9914;
                transition: background-color 0.7s;
            }
        </style>
        <div>

            <div class="row m-3">
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card teacher-data-card1">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="fa fa-user menu-icon" style="font-size: 45px;"></i>
                                    </div>
                                    <div class="media-body text-left" style="margin-left: 10px;">
                                        <!-- Add margin here -->
                                        <h5 class="mb-1" id="total-teachers" style="font-size: 24px;">Loading...</h5>
                                        <span style="color: grey">Total Teachers</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card teacher-data-card2">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="fa fa-sign-in menu-icon" style="font-size: 40px;"></i>
                                    </div>
                                    <div class="media-body text-left" style="margin-left: 10px;">
                                        <!-- Add margin here -->
                                        <h5 class="mb-1" id="teachers-present-today" style="font-size: 24px;">
                                            0</h5>
                                        <span style="color: grey">Present Today</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card teacher-data-card3">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="fa fa-sign-out menu-icon" style="font-size: 40px;"></i>
                                    </div>
                                    <div class="media-body text-left" style="margin-left: 10px;">
                                        <!-- Add margin here -->
                                        <h5 class="mb-1" id="teachers-absent-today" style="font-size: 24px;">
                                            0</h5>
                                        <span style="color: grey">Absent Today</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card teacher-data-card4">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="fa fa-clock-o menu-icon" style="font-size: 45px;"></i>
                                    </div>
                                    <div class="media-body text-left" style="margin-left: 10px;">
                                        <!-- Add margin here -->
                                        <h5 class="mb-1" id="teachers-late-today" style="font-size: 24px;">0
                                        </h5>
                                        <span style="color: grey">Late Teachers</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row m-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title">Attendance Report Chart</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <canvas id="attendance-chart" style="width: 100%; height: 400px;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row m-1">
                <div class="col-xl-3 col-sm-6 col-12 m-3">
                    <div class="card" style="width: 400px; height: 400px;">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-center align-self-center">
                                        <h5 class="mb-2">Teacher Gender</h5>
                                        <canvas id="gender-chart" width="300" height="300"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 col-12 m-3">
                    <div class="card" style="width: 600px; height: auto; margin-left: 50%;">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h5 class="mb-2">Top 5 Attendant</h5>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover" id="top-attendants-table">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col">Rank</th>
                                                        <th scope="col">Teacher Name</th>
                                                        <th scope="col">Attendance</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Data will be populated here with JavaScript -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


        </div>

        <style>
            /* Add some custom CSS for the table */
            .table-bordered {
                border: 1px solid #dee2e6;
            }

            .table-bordered thead th {
                border-bottom: 2px solid #dee2e6;
            }

            .table-hover tbody tr:hover {
                background-color: #f8f9fa;
            }

            .thead-light th {
                background-color: #f2f2f2;
            }
        </style>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // First API call
            var xhr = new XMLHttpRequest();
            xhr.open('GET', "{{ asset('/dashboard-data') }}", true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        var data = JSON.parse(xhr.responseText);
                        // Update the HTML element with the fetched data
                        document.getElementById('total-teachers').textContent = data.teacher_count;

                        // Trigger another API call here
                        var xhr2 = new XMLHttpRequest();
                        xhr2.open('GET', "{{ asset('/teacher-management') }}", true);

                        xhr2.onreadystatechange = function() {
                            if (xhr2.readyState === 4) {
                                if (xhr2.status === 200) {
                                    var anotherData = JSON.parse(xhr2.responseText);
                                    // Update a different HTML element or variable with the fetched data from the second API call
                                    // For example, update a different div with the teacher data
                                    document.getElementById('teachers-data').textContent = anotherData.teacher;
                                } else {
                                    console.error('Error fetching data from the teacher-management. HTTP status:', xhr2
                                        .status);
                                }
                            }
                        };

                        xhr2.send();
                    } else {
                        console.error('Error fetching data. HTTP status:', xhr.status);
                    }
                }
            };

            xhr.send();

            document.addEventListener("DOMContentLoaded", function() {
                var ctx = document.getElementById("attendance-chart").getContext("2d");

                var dummyChartData = {
                    labels: ["2023-09-01", "2023-09-02", "2023-09-03", "2023-09-04", "2023-09-05", "2023-09-06",
                        "2023-09-07", "2023-09-08", "2023-09-09", "2023-09-10", "2023-09-11"
                    ],
                    data: [75, 80, 85, 90, 88, 92, 80, 85, 90, 88, 200],
                };

                var chart = new Chart(ctx, {
                    type: "line",
                    data: {
                        labels: dummyChartData.labels,
                        datasets: [{
                            label: "Attendance",
                            data: dummyChartData.data,
                            borderColor: "rgb(75, 192, 192)",
                            borderWidth: 2,
                            fill: false,
                        }, ],
                    },
                    options: {
                        scales: {
                            x: {
                                type: "time",
                                time: {
                                    unit: "day",
                                },
                                title: {
                                    display: true,
                                    text: "Date",
                                },
                            },
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: "Attendance",
                                },
                            },
                        },
                    },
                });
            });

            // Dummy data for teacher gender chart
            var genderData = {
                labels: ["Male", "Female", "Other"],
                data: [60, 30, 10], // Replace with your actual data percentages
                backgroundColor: ["#36A2EB", "#FF6384", "#FFCE56"], // Colors for the segments
            };

            // Create a function to initialize the gender chart
            function initializeGenderChart(data) {
                var ctx = document.getElementById("gender-chart").getContext("2d");
                new Chart(ctx, {
                    type: "doughnut", // Use "doughnut" for a pie chart
                    data: {
                        labels: data.labels,
                        datasets: [{
                            data: data.data,
                            backgroundColor: data.backgroundColor,
                        }, ],
                    },
                });
            }

            // Initialize and update the gender chart with the dummy data
            initializeGenderChart(genderData);

            // Dummy data for the top attending teachers (replace this with an API call)
            var topAttendantsData = [{
                    rank: 1,
                    name: "Teacher 1",
                    attendance: "95%"
                },
                {
                    rank: 2,
                    name: "Teacher 2",
                    attendance: "93%"
                },
                {
                    rank: 3,
                    name: "Teacher 3",
                    attendance: "92%"
                },
                {
                    rank: 4,
                    name: "Teacher 4",
                    attendance: "90%"
                },
                {
                    rank: 5,
                    name: "Teacher 5",
                    attendance: "89%"
                }
            ];

            // Function to populate the table with data
            function populateTopAttendantsTable(data) {
                var tableBody = document.getElementById("top-attendants-table").getElementsByTagName("tbody")[0];

                for (var i = 0; i < data.length; i++) {
                    var row = tableBody.insertRow(i);
                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);
                    var cell3 = row.insertCell(2);
                    cell1.innerHTML = data[i].rank;
                    cell2.innerHTML = data[i].name;
                    cell3.innerHTML = data[i].attendance;
                }
            }

            // Call the function to populate the table with the dummy data (replace with API call later)
            populateTopAttendantsTable(topAttendantsData);
        </script>
    @endsection
