<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href='{{ asset('assets/images/favicon.ico') }}'>

    <!-- Sweet Alert css-->
    <link href='{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}' rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src='{{ asset('assets/js/layout.js') }}'></script>
    <!-- Bootstrap Css -->
    <link href='{{ asset('assets/css/bootstrap.min.css') }}' rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href='{{ asset('assets/css/icons.min.css') }}' rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href='{{ asset('assets/css/app.min.css') }}' rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href='{{ asset('assets/css/custom.min.css') }}' rel="stylesheet" type="text/css" />

</head>

<body>
    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Your ALL Services</h4>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="listjs-table" id="customerList">


                            <div class="table-responsive table-card mt-3 mb-1">
                                <table class="table align-middle table-nowrap" id="customerTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 50px;">
                                                {{-- <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll"
                                                        value="option">
                                                </div> --}}
                                            </th>


                                            <th class="sort" data-sort="customer_name">Category</th>
                                            <th class="sort" data-sort="email">ServiceType</th>
                                            <th class="sort" data-sort="phone">Alert Date</th>
                                            <th class="sort" data-sort="date">Warranty Alert Date</th>
                                            <th class="sort" data-sort="status">Status</th>
                                             <th class="sort" data-sort="status">Unit</th>
                                            <th class="sort" data-sort="action">Action</th>
                                            <th class="sort" data-sort="action">DailyUsage</th>
                                        </tr>
                                    </thead>
                                    <tbody id="servicetablebody">
                                        <tr>
                                            <th scope="row">
                                                {{-- <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="chk_child"
                                                        value="option1">
                                                </div> --}}
                                            </th>
                                            <td style="display:none;"><a class="fw-medium link-primary">#VZ2101</a></td>
                                            <td></td>

                                            <td><span
                                                    class="badge bg-success-subtle text-success text-uppercase"></span>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <div>
                                                        <button class="btn btn-sm btn-primary edit-item-btn"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#showModal">Edit</button>
                                                    </div>
                                                    {{-- <div class="remove">
                                                                    <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal">Remove</button>
                                                                </div> --}}
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="noresult" style="display: none">
                                    <div class="text-center">
                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                            colors="primary:#121331,secondary:#08a88a"
                                            style="width:75px;height:75px"></lord-icon>
                                        <h5 class="mt-2">Sorry! No Result Found</h5>
                                        <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find
                                            any orders for you search.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <div class="pagination-wrap hstack gap-2">
                                    <a class="page-item pagination-prev disabled" href="javascript:void(0);">
                                        Previous
                                    </a>
                                    <ul class="pagination listjs-pagination mb-0"></ul>
                                    <a class="page-item pagination-next" href="javascript:void(0);">
                                        Next
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>








            <!-- end col -->
        </div>
    </div>

    <div class="modal fade" id="editServiceModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Service Alert</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="editServiceId">

                    <div class="mb-3">
                        <label class="form-label">Alert Status</label>
                        <select id="editAlertStatus" class="form-select form-select-dark ">
                            <option class="text-black" value="active">Active</option>
                            <option class="text-black" value="paused">Paused</option>
                            <option class="text-black" value="completed">Completed</option>
                        </select>
                    </div>

                    {{-- <div class="mb-3">
          <label class="form-label">Custom Alert Date</label>
          <input type="date" id="editAlertDate" class="form-control">
        </div> --}}

                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" onclick="updateService()">Save</button>
                </div>

            </div>
        </div>
    </div>

    


    
    <div class="modal fade" id="dailyusageid" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Daily usage</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="editServiceId">
          <h1>Add DAily Usage According to your Usage Unit which you mentioned before</h1>
                    <div class="mb-3">
                        <input type="text" id="usage" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" onclick="dailyUsage()">Save</button>
                </div>

            </div>
        </div>
    </div>



    <div class="modal fade" id="successModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-5">
                    <div class="mb-4">
                        <i class="ri-checkbox-circle-line display-1 text-success"></i>
                    </div>
                    <h4 class="mb-3" id="modalMessage">Service Alert Created Successfully!</h4>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

        <div class="modal fade" id="successModal1" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-5">
                    <div class="mb-4">
                        <i class="ri-checkbox-circle-line display-1 text-success"></i>
                    </div>
                    <h4 class="mb-3" id="modalMessage1">Service Alert Created Successfully!</h4>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>




    <!-- JAVASCRIPT -->
    <script src='{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}'></script>
    <script src='{{ asset('assets/libs/simplebar/simplebar.min.js') }}'></script>
    <script src='{{ asset('assets/libs/node-waves/waves.min.js') }}'></script>
    <script src='{{ asset('assets/libs/feather-icons/feather.min.js') }}'></script>
    <script src='{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}'></script>
    <script src='{{ asset('assets/js/plugins.js') }}'></script>
    <!-- prismjs plugin -->
    <script src='{{ asset('assets/libs/prismjs/prism.js') }}'></script>
    <script src='{{ asset('assets/libs/list.js/list.min.js') }}'></script>
    <script src='{{ asset('assets/libs/list.pagination.js/list.pagination.min.js') }}'></script>

    <!-- listjs init -->
    <script src='{{ asset('assets/js/pages/listjs.init.js') }}'></script>

    <!-- Sweet Alerts js -->
    <script src='{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}'></script>

    <!-- App js -->
    <script src='{{ asset('assets/js/app.js') }}'></script>
    <script>
        const MAIN_URL = 'http://127.0.0.1:8000/api';
        let servicesData = [];
        document.addEventListener('DOMContentLoaded', function() {
            loadCategories();
            allServicesLoaded();

        });
        async function loadCategories() {
            try {
                const token = localStorage.getItem('auth_token');
                const response = await fetch(`${MAIN_URL}/category`, {
                    method: 'GET',
                    headers: {
                        'content-type': "application/json",
                        'accept': 'application/json',
                        'Authorization': `Bearer ${token}`
                    }
                });
                const data = await response.json();
                categoriesData = data;
                console.log(categoriesData)


            } catch (error) {
                console.log("Error Loading Categories", error)
            }
        }
        async function allServicesLoaded() {
            try {
                const token = localStorage.getItem('auth_token');

                const response = await fetch(`${MAIN_URL}/service`, {
                    method: "GET",
                    headers: {
                        "content-type": "application/json",
                        "accept": "application/json",
                        "Authorization": `Bearer ${token}`
                    }
                });

                const data = await response.json();
                servicesData = data;
                renderServiceTable();

                // const tableBody = document.getElementById("servicetablebody");
                //             tableBody.innerHTML = '';

                // servicesData.forEach((element,index) => {
                //    const Row=document.createElement('tr');
                //    const cell=document.createElement('td');

                //    cell.textContent=JSON.stringify(element);
                //    Row.appendChild(cell);
                //    tableBody.appendChild(Row);

                // });
                console.log(servicesData);
            } catch (error) {
                console.log(error)
            }
        }





        function renderServiceTable() {
            const tableBody = document.getElementById("servicetablebody");
            tableBody.innerHTML = '';

            servicesData.forEach((service, index) => {

                // find category name by matching category_id
                const category = categoriesData.find(c => c.id === service.category_id);
                let serviceTypeName = "N/A";
                let subcategoryName = "N/A";
                if (category && Array.isArray(category.subcategories)) {
                    let subcat = category.subcategories.find(c => c.id === service.subcategory_id);
                    if (subcat) {
                        subcategoryName = subcat ? subcat.subcategory : "N/A";

                        if (Array.isArray(subcat.service_types)) {
                            let sType = subcat.service_types.find(c => c.id === service.service_type_id);
                            serviceTypeName = sType ? sType.service_type : "N/A";
                        }
                    }
                }

                console.log(serviceTypeName)
                const row = document.createElement('tr');

                row.innerHTML = `
            <td>${index + 1}</td>
            <td>${category ? category.category : "No Category"}</td>
            <td>${serviceTypeName}</td>
            <td>${service.finalAlertDate ?? "N/A"}</td>
            <td>${service.WarrantyEndDate ?? "N/A"}</td>
            <td>${service.AlertStatus ?? "N/A"}</td>
            <td>${service.alertType === 'usage' ? service.UsageUnit : ""}</td>

            <td>
                <button class="btn btn-sm btn-primary edit-item-btn"
                        data-bs-toggle="modal"
                        data-bs-target="#editServiceModal"
                        onclick='openEditModal(${JSON.stringify(service)})'>
                    Edit
                </button>
            </td>
             <td>
               
                       ${service.alertType === 'usage' ? `<button 
                       class="btn btn-sm btn-primary daily-usage-btn" 
                        data-bs-toggle="modal"
                        data-bs-target="#dailyusageid"
                       data-service-id="${service.id}">Daily Usage</button>` : ''}
                        
                        
                        
                 
            </td>
        `;

                tableBody.appendChild(row);
            });
             // <button class="btn btn-sm btn-primary daily-usage-btn"
                //         data-bs-toggle="modal"
                //         data-bs-target="#dailyusageid"
                //        data-service-id="${service.id}"
       
       document.querySelectorAll(".daily-usage-btn").forEach(btn=>{
    btn.addEventListener('click',()=>{
        const serviceId=btn.getAttribute('data-service-id');
        console.log("serviceId",serviceId);
        document.getElementById('editServiceId').value = serviceId;

        // Clear previous input
        document.getElementById('usage').value = '';
    })
})
       
       
        }





        function openEditModal(service) {
            console.log("Opening edit modal for service:", service); // Debug

            // Fill hidden ID field
            document.getElementById("editServiceId").value = service.id;

            // Fill fields
            document.getElementById("editAlertStatus").value = service.AlertStatus ?? "";
            // document.getElementById("editAlertDate").value = service.customAlertDate ?? "";
        }






        async function updateService() {
            const id = document.getElementById("editServiceId").value;
            if (!id) {
                alert("error id is not defined");
                return;
            }
            const status = document.getElementById("editAlertStatus").value;
            // const date = document.getElementById("editAlertDate").value;

            const bodyData = {
                AlertStatus: status
            }
            const token = localStorage.getItem('auth_token');

            try {

                const response = await fetch(`${MAIN_URL}/service/${id}`, {
                    method: "PUT",
                    headers: {
                        "Content-type": "application/json",
                        "Accept": "application/json",
                        "Authorization": `Bearer ${token}`
                    },
                    body: JSON.stringify(bodyData)
                });
                const result = await response.json();

                console.log(result);
                if (response.ok) {
                    document.getElementById("modalMessage").textContent = result.message ||
                        "Alert Status Updated Succeffully";
                    const modal = new bootstrap.Modal(document.getElementById("successModal"));
                    modal.show();

                }



                location.reload();





            } catch (error) {
                console.log("upsate error", error);
                alert("update error")
            }
        }
         
        
        
            
        async function dailyUsage() {
            const serviceId = document.getElementById("editServiceId").value;
            const usage = document.getElementById("usage").value;
            const bodyData = {
                service_item_id:serviceId,
                usage:usage
            }
            const token = localStorage.getItem('auth_token');
            try {
                const response = await fetch(`${MAIN_URL}/daily-usage`, {
                    method: "POST",
                    headers: {
                        "Content-type": "application/json",
                        "Accept": "application/json",
                        "Authorization": `Bearer ${token}`
                    },
                    body: JSON.stringify(bodyData)
                });
                const result = await response.json();

                console.log(result);
                if (response.ok) {
                    document.getElementById("modalMessage1").textContent = result.message ||
                        "Daily Usage Updated Succeffully";
                    const modal = new bootstrap.Modal(document.getElementById("successModal1"));
                    modal.show();

                }
                // location.reload();
            } catch (error) {
                console.log("upsate error", error);
                alert("update error")
            }
        }
    </script>
</body>

</html>
