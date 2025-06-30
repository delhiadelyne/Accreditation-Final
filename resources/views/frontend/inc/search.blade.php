<div class="container z-1">
    <div class="d-flex" id="reserve-form">
        <div class="mx-auto md:w-5/6">
            <div class="lg:col-span-10">
                <div class="p-3 bg-white border-0 rounded-md shadow dark:bg-slate-900">
                    <form action="#">
                        <div class="registration-form text-dark text-start">
                            <div class="grid grid-cols-1 gap-6 lg:grid-cols-4 md:grid-cols-2 lg:gap-0">
                                <div class="relative filter-search-form filter-border">
                                    <i class="uil uil-briefcase-alt icons"></i>
                                    <input name="name" type="text" id="job-keyword" class="border-0 form-input filter-input-box bg-gray-50 dark:bg-slate-800" placeholder="Search your Keywords">
                                </div>
                                <div class="relative filter-search-form filter-border">
                                    <i class="uil uil-map-marker icons"></i>
                                    <select class="form-select" data-trigger name="choices-location" id="choices-location" aria-label="Default select example">
                                        <option value="RW">Rwanda</option>
                                    </select>
                                </div>
                                <div class="relative filter-search-form filter-border">
                                    <i class="uil uil-briefcase-alt icons"></i>
                                    <select class="form-select" data-trigger name="choices-type" id="choices-type" aria-label="Default select example">
                                        <option selected="" value="1">3 Months</option>
                                                <option value="2">3 Months</option>
                                                <option value="3">6 Months</option>
                                                <option value="4">1 Year</option>
                                    </select>
                                </div>
                                <input type="submit" id="search" name="search" style="height: 60px;" class="text-white btn bg-emerald-600 hover:bg-emerald-700 border-emerald-600 hover:border-emerald-700 searchbtn submit-btn w-100" value="Search">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
