<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>CREATE ALERT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href='{{ asset('assets/images/favicon.ico') }}'>

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
    <div class="container-fluid  p-4">
        <div class="row">
            <div class="col-xxl-6">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">SERVICE ALERT CREATE</h4>
                        <div class="flex-shrink-0">
                            {{-- <div class="form-check form-switch form-switch-right form-switch-md">
                                            <label for="form-grid-showcode" class="form-label text-muted">Show Code</label>
                                            <input class="form-check-input code-switcher" type="checkbox" id="form-grid-showcode">
                                        </div> --}}
                        </div>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <p class="text-muted">Create the service Alert or warranty Alert you want.......</p>
                        <div class="live-preview">
                            <form id="serviceForm">

                                <!-- Category Selection -->
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="category" class="form-label">Category <span
                                                class="text-danger">*</span></label>
                                        <select class="form-select" id="category" required>
                                            <option value="">Select Category</option>
                                        </select>
                                    </div>

                                    <!-- Custom Category (Hidden by default) -->
                                    <div class="col-md-6 mb-3 d-none" id="customCategoryDiv">
                                        <label class="form-label">Custom Category</label>
                                        <input type="text" class="form-control" id="customCategory"
                                            placeholder="Enter custom category">
                                    </div>
                                </div>

                                <!-- Subcategory Selection -->
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="subcategory" class="form-label">Subcategory <span
                                                class="text-danger">*</span></label>
                                        <select class="form-select" id="subcategory" required>
                                            <option value="">Select Subcategory</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" id="isCustomSubCategory">
                                            <label class="form-check-label" for="isCustomSubCategory">
                                                Custom Subcategory
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Custom Subcategory Input -->
                                <div class="row d-none" id="customSubcategoryDiv">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Custom Subcategory Name</label>
                                        <input type="text" class="form-control" id="customSubcategoryName"
                                            placeholder="Enter custom subcategory">
                                    </div>
                                </div>

                                <!-- Service Type Selection -->
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="serviceType" class="form-label">Service Type <span
                                                class="text-danger">*</span></label>
                                        <select class="form-select" id="serviceType" required>
                                            <option value="">Select Service Type</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" id="isCustomServiceType">
                                            <label class="form-check-label" for="isCustomServiceType">
                                                Custom Service Type
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Custom Service Type Input -->
                                <div class="row d-none" id="customServiceTypeDiv">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Custom Service Type Name</label>
                                        <input type="text" class="form-control" id="customServiceTypeName"
                                            placeholder="Enter custom service type">
                                    </div>
                                </div>

                                <!-- Item Details -->
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="itemAge" class="form-label">Item Age (Years)</label>
                                        <input type="number" class="form-control" id="itemAge"
                                            placeholder="Enter item age">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="itemCondition" class="form-label">Item Condition</label>
                                        <select class="form-select" id="itemCondition">

                                            <option value="new">New</option>
                                            <option value="moderate" selected>Moderate</option>
                                            <option value="old">Old</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Alert Type -->
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="alertType" class="form-label">Alert Type <span
                                                class="text-danger">*</span></label>
                                        <select class="form-select" id="alertType" required>
                                            <option value="usage">Usage Based</option>
                                            <option value="time">Time Based</option>
                                            {{-- <option value="both">Both</option> --}}
                                            <option value="custom">Custom Date</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="alertStatus" class="form-label">Alert Status</label>
                                        <select class="form-select" id="alertStatus">
                                            <option value="active">Active</option>
                                            <option value="paused">paused</option>
                                            <option value="completed">completed</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Time Based Alert (Hidden by default) -->
                                <div class="row d-none" id="timeAlertDiv">
                                    <div class="col-md-6 mb-3">
                                        <label for="timeThreshold" class="form-label">Time Threshold (Days)</label>
                                        <input type="number" class="form-control" id="timeThreshold"
                                            placeholder="Enter days">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="lastServiceDate" class="form-label">Last Service Date</label>
                                        <input type="date" class="form-control" id="lastServiceDate">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="daysSpecific" class="form-label">How many days before you want Alert?</label>
                                        <input type="number" class="form-control" id="daysSpecific"
                                            placeholder="Enter days">
                                    </div>
                                </div>

                                <!-- Usage Based Alert (Default visible) -->
                                <div class="row" id="usageAlertDiv">
                                   <div class="col-md-4 mb-3">
                                    <label for="usageUnit" class="form-label">Usage Unit</label>
                                    {{-- <select class="form-select " id="usageUnit"> --}}
                                        <input id="usageUnit" type="text" class="form-control" value="" placeholder="usage unit">
                                        {{-- <option value="km">Kilometers</option>
                                        <option value="miles">Miles</option> --}}
                                    {{-- </select> --}}
                                </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="usageThreshold" class="form-label">Usage Threshold</label>
                                        <input type="number" class="form-control" id="usageThreshold"
                                            placeholder="e.g., 5000">
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="currentUsage" class="form-label">Current Usage</label>
                                        <input type="number" class="form-control" id="currentUsage"
                                            placeholder="e.g., 50">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="avgDailyUsage" class="form-label">Average Daily Usage</label>
                                        <input type="number" class="form-control" id="avgDailyUsage"
                                            placeholder="e.g., 6">
                                    </div>
                                </div>

                                <!-- Custom Date Alert (Hidden by default) -->
                                <div class="row d-none" id="customAlertDiv">
                                    <div class="col-md-6 mb-3">
                                        <label for="customAlertDate" class="form-label">Custom Alert Date</label>
                                        <input type="date" class="form-control" id="customAlertDate">
                                    </div>
                                </div>

                                <!-- Warranty Information -->
                                <div class="card mt-3 mb-3">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Warranty Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="warrantyAlert">
                                                    <label class="form-check-label" for="warrantyAlert">
                                                        Enable Warranty Alert
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row d-none" id="warrantyDiv">
                                            <div class="col-md-4 mb-3">
                                                <label for="warrantyPeriod" class="form-label">Warranty Period
                                                    (Years)</label>
                                                <input type="number" class="form-control" id="warrantyPeriod"
                                                    placeholder="e.g., 15">
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label for="warrantyStartDate" class="form-label">Warranty Start
                                                    Date</label>
                                                <input type="date" class="form-control" id="warrantyStartDate">
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label for="warrantyAlertDaysBefore" class="form-label">Alert Days
                                                    Before
                                                    Expiry</label>
                                                <input type="number" class="form-control"
                                                    id="warrantyAlertDaysBefore" placeholder="e.g., 10">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="ri-save-line me-1"></i> Create Service Alert
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="d-none code-view">
                            <pre class="language-markup" style="height: 375px;">

                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
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

                         <!-- JAVASCRIPT -->
    <script src='{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}'></script>
    <script src='{{ asset('assets/libs/simplebar/simplebar.min.js') }}'></script>
    <script src='{{ asset('assets/libs/node-waves/waves.min.js') }}'></script>
    <script src='{{ asset('assets/libs/feather-icons/feather.min.js') }}'></script>
    <script src='{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}'></script>
    <script src='{{ asset('assets/js/plugins.js') }}'></script>

    <!-- prismjs plugin -->
    <script src='{{ asset('assets/libs/prismjs/prism.js') }}'></script>

    <script src='{{ asset('assets/js/app.js') }}'></script>
<script>
    const MAIN_URL = "http://127.0.0.1:8000/api"
    let categoriesData = [];
    let selectedCategoryData = null;
    let selectedSubcategoryData = null;

    document.addEventListener('DOMContentLoaded', function() {
        loadCategories();
        allClickChange();
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


            const categorySelect = document.getElementById("category");
            categorySelect.innerHTML = '<option value="">Select Category</option>';

            categoriesData.forEach((category, index) => {
                const option = document.createElement('option');
                option.value = category.id || index;
                option.textContent = category.category;
                option.dataset.categoryData = JSON.stringify(category)
                categorySelect.appendChild(option);

            });


            console.log(categorySelect)


            console.log(categoriesData)


        } catch (error) {
            console.log("Error Loading Categories", error)
        }
    }

    function allClickChange() {
        //on category click

        document.getElementById("category").addEventListener("change", function() {
            const selectedOption = this.options[this.selectedIndex];
            if (this.value) {
                selectedCategoryData = JSON.parse(selectedOption.dataset
                    .categoryData); //categoryData dont need to declare it create automatically
                console.log("parse data", selectedCategoryData)
                loadSubcategories(selectedCategoryData);
            } else {
                clearSubcategories();
                clearServiceTypes();
            }
        });
        //on subcategory click

        document.getElementById("subcategory").addEventListener("change", function() {
            const selectedOption = this.options[this.selectedIndex];
            if (this.value) {
                selectedSubcategoryData = JSON.parse(selectedOption.dataset
                    .categoryData); //categoryData dont need to declare it create automatically
                console.log("parse data", selectedSubcategoryData)
                loadserviceTypes(selectedSubcategoryData);

                //usageUnit
                //timeThreshold
                //sageThreshold
                document.getElementById("usageUnit").value = selectedSubcategoryData.defaultUsageUnit || '';

                document.getElementById('timeThreshold').value = selectedSubcategoryData.defaultTimeThreshold ||
                    0;
                document.getElementById('usageThreshold').value = selectedSubcategoryData
                    .defaultUsageThreshold || 0;

            } else {

                clearServiceTypes();
            }






        })
        //custom subcategory true or false change
        document.getElementById("isCustomSubCategory").addEventListener("change", function() {
            const customSubcategoryDiv = document.getElementById("customSubcategoryDiv");
            const subCategory = document.getElementById("subcategory");
            if (this.checked) {

                customSubcategoryDiv.classList.remove('d-none');
                subCategory.disabled = true;
            } else {
                customSubcategoryDiv.classList.add('d-none');
                subCategory.disabled = false;
                document.getElementById('customSubcategoryName').value = '';
            }
        })

        //custom servicetype true or false change
        document.getElementById("isCustomServiceType").addEventListener("change", function() {
            const customServiceTypeDiv = document.getElementById("customServiceTypeDiv");
            const service_type = document.getElementById("serviceType");
            if (this.checked) {

                customServiceTypeDiv.classList.remove('d-none');
                service_type.disabled = true;
            } else {
                customServiceTypeDiv.classList.add('d-none');
                service_type.disabled = false;
                document.getElementById('customServiceTypeName').value = '';
            }
        })


        //Alert Change
        document.getElementById('alertType').addEventListener("change", function() {
            const timeDiv = document.getElementById('timeAlertDiv');
            const usageDiv = document.getElementById('usageAlertDiv');
            // const both = document.getElementById('usageAlertDiv');
            const customDiv = document.getElementById('customAlertDiv');
            timeDiv.classList.add('d-none');
            usageDiv.classList.add('d-none');
            customDiv.classList.add('d-none');
            if (this.value === 'time') {
                timeDiv.classList.remove('d-none');
            } else if (this.value === 'usage') {
                usageDiv.classList.remove('d-none');
            } else if (this.value === 'custom') {
                customDiv.classList.remove('d-none');
            }
        })

        //warrantyAlertChange
        document.getElementById('warrantyAlert').addEventListener("change", function() {
            const warrantyDiv = document.getElementById('warrantyDiv');
            warrantyDiv.classList.add('d-none');
            if (this.checked) {
                warrantyDiv.classList.remove('d-none');
            } else {
                warrantyDiv.classList.add('d-none');
            }

        })

     document.getElementById("serviceForm").addEventListener("submit",handleFormSubmit)

    }

    function loadSubcategories(categoryData) {
        const subcategorySelect = document.getElementById("subcategory");
        subcategorySelect.innerHTML = '<option value="">Select SubCategory</option>';

        if (categoryData.subcategories) {
            categoryData.subcategories.forEach((subcategory, index) => {
                const option = document.createElement('option');
                option.value = subcategory.id || index;
                option.textContent = subcategory.subcategory;
                option.dataset.categoryData = JSON.stringify(subcategory)
                subcategorySelect.appendChild(option);
            })
            subcategorySelect.disabled = false;
        }
    }

    function loadserviceTypes(subcategoryData) {
        const serviceTypeSelect = document.getElementById("serviceType");
        serviceTypeSelect.innerHTML = '<option value="">Select Service Type</option>';

        if (subcategoryData.service_types && subcategoryData.service_types.length > 0) {
            subcategoryData.service_types.forEach((servicetype, index) => {
                const option = document.createElement('option');
                option.value = servicetype.id || index;
                option.textContent = servicetype.service_type;
                option.dataset.categoryData = JSON.stringify(servicetype)
                serviceTypeSelect.appendChild(option);
            })
            serviceTypeSelect.disabled = false;
        }
    }
function clearSubcategories() {
            const subcategorySelect = document.getElementById('subcategory');
            subcategorySelect.innerHTML = '<option value="">Select Subcategory</option>';
            subcategorySelect.disabled = true;
            selectedSubcategoryData = null;
        }

        // Clear service types
        function clearServiceTypes() {
            const serviceTypeSelect = document.getElementById('serviceType');
            serviceTypeSelect.innerHTML = '<option value="">Select Service Type</option>';
            serviceTypeSelect.disabled = true;
        }

   async function handleFormSubmit(e){
        e.preventDefault();
        const submitBtn=e.target.querySelector('button[type="submit"]');
        const originalText=submitBtn.innerHTML;
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Creating...';
        submitBtn.disabled = true;
        try {
            const formData=getFormData();
            console.log("submmitting Data",formData);

           const token = localStorage.getItem('auth_token');
            const response = await fetch(`${MAIN_URL}/service`, {
                method: 'POST',
                headers: {
                    'content-type': "application/json",
                    'accept': 'application/json',
                    'Authorization': `Bearer ${token}`
                },
                body:JSON.stringify(formData)
            });

            const data = await response.json();
            console.log("response",data);
               if (response.ok) {
                    // Show success modal
                    document.getElementById('modalMessage').textContent = data.message ||
                        'Service Alert Created Successfully!';
                    const modal = new bootstrap.Modal(document.getElementById('successModal'));
                    modal.show();

                    // Reset form
                    document.getElementById('serviceForm').reset();
                    clearSubcategories();
                    clearServiceTypes();

                } else {
                    // Show error
                    let errorMessage = 'Failed to create service alert';
                    if (data.message) {
                        if (typeof data.message === 'string') {
                            errorMessage = data.message;
                        } else if (typeof data.message === 'object') {
                            errorMessage = Object.values(data.message).flat().join(', ');
                        }
                    }
                    alert(errorMessage);
                }
        } catch (error) {
            console.log("ERROR OCCUR IN CREATING SERVICE ALERT",error);
        }
        finally{
            submitBtn.innerHTML=originalText;
            submitBtn.disabled=false;
        }

    }
    function getFormData() {

        const alertType = document.getElementById('alertType').value;
        const isCustomSubCategory = document.getElementById('isCustomSubCategory').checked;
        const isCustomServiceType = document.getElementById('isCustomServiceType').checked;
        const warrantyEnabled = document.getElementById('warrantyAlert').checked;
        //convert given value to integer and if not then null return
        const getIntOrNull = (value) => {
            const parsed = parseInt(value);
            return isNaN(parsed) ? null : parsed;
        };

        const formData = {
            category_id: document.getElementById("category").value,
            subcategory_id: isCustomSubCategory ? null : document.getElementById('subcategory').value,
            service_type_id: isCustomServiceType ? null : document.getElementById('serviceType')
                .value,
            itemAge: document.getElementById("itemAge").value || "0",
            itemCondition: document.getElementById("itemCondition").value,
            isCustomSubCategory: isCustomSubCategory,
            customSubcategoryName: isCustomSubCategory ? document.getElementById('customSubcategoryName').value :
                "", //required only for custom 
            isCustomServiceType: isCustomServiceType,
            customServiceTypeName: isCustomServiceType ? document.getElementById('customServiceTypeName').value :
                "", //required only for custom
            alertType: alertType,
            // timeThresold:
            // lastServicedate: 
            // daysSpecific: 
            // UsageUnit: 
            // UsageThresold: 
            // CurrentUsage: 
            // AvgDailyUsage:
            // customAlertDate: 
            // WarrantyPeriod: 
            // WarrantyStartDate: 
            // WarrantyAlert: 
            // WarrantyAlertDaysBefore: 
            AlertStatus: document.getElementById("alertStatus").value,
            serviceHistory: []
        }
        if (alertType === 'time') {
            formData.timeThresold = getIntOrNull(document.getElementById('timeThreshold').value) || 0;
            formData.lastServicedate = document.getElementById('lastServiceDate').value || "";
            formData.daysSpecific = getIntOrNull(document.getElementById('daysSpecific').value) || 0;
            formData.UsageUnit = "";
            formData.UsageThresold = 0;
            formData.CurrentUsage = 0;
            formData.AvgDailyUsage = 0;
            formData.customAlertDate = "";
        } else if (alertType === 'usage') {
            formData.UsageUnit = document.getElementById('usageUnit').value;
            formData.UsageThresold = getIntOrNull(document.getElementById('usageThreshold').value) || 0;
            formData.CurrentUsage = getIntOrNull(document.getElementById('currentUsage').value) || 0;
            formData.AvgDailyUsage = getIntOrNull(document.getElementById('avgDailyUsage').value) || 0;
            formData.timeThresold = 0;
            formData.lastServicedate = "";
            formData.daysSpecific = 0;
            formData.customAlertDate = "";
        } else if (alertType === 'custom') {
            formData.customAlertDate = document.getElementById('customAlertDate').value || "";
            formData.timeThresold = 0;
            formData.UsageUnit = "";
            formData.UsageThresold = 0;
            formData.CurrentUsage = 0;
            formData.AvgDailyUsage = 0;
            formData.lastServicedate = "";
            formData.daysSpecific = 0;
        }

        formData.WarrantyAlert = warrantyEnabled;
        if (warrantyEnabled) {
            formData.WarrantyPeriod = getIntOrNull(document.getElementById('warrantyPeriod').value) || 0;
            formData.WarrantyStartDate = document.getElementById('warrantyStartDate').value || "";
            formData.WarrantyAlertDaysBefore = getIntOrNull(document.getElementById('warrantyAlertDaysBefore').value) ||
                0;
        } else {
            formData.WarrantyPeriod = 0;
            formData.WarrantyStartDate = "";
            formData.WarrantyAlertDaysBefore = 0;
        }

        return formData;
    }
</script>
</body>
</html>
