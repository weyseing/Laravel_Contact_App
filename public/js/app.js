// =============================
// Index companies dropdown list
// =============================
document.getElementById("filter_company_id").addEventListener("change", function(){
    let companyId = this.value || this.options[this.selectedIndex].value;                                //get company ID from dropdown list
    window.location.href = window.location.href.split("?")[0] + "?company_id=" + companyId;             //reload page with company ID as parameter
})