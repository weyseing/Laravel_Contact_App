// =============================
// Index companies dropdown list
// =============================
document.getElementById("filter_company_id").addEventListener("change", function(){
    let companyId = this.value || this.options[this.selectedIndex].value;                                //get company ID from dropdown list
    window.location.href = window.location.href.split("?")[0] + "?company_id=" + companyId;             //reload page with company ID as parameter
})

// =============================
// Index page - delete btn onclick
// =============================
document.querySelectorAll('.btn-delete').forEach((button) => {
    // add onclick listener
    button.addEventListener('click', function(event) {

        // stop default a tag link function
        event.preventDefault()
        
        // set delete link from btn to form action & submit delete form
        if (confirm("Are you sure?")) {
            let action = this.getAttribute('href')
            let form = document.getElementById('form-delete')
            form.setAttribute('action', action)
            form.submit()
        }
    })
})

// =============================
// Index page - clear btn
// =============================
document.getElementById('btn-clear').addEventListener('click', () => {
    let input = document.getElementById('search'),
        select = document.getElementById('filter_company_id')

    // reset
    input.value = ""
    select.selectedIndex = 0

    // navigate
    window.location.href = window.location.href.split('?')[0]
})

// =============================
// HIDE or SHOW clear btn
// =============================
const toggleClearButton = () => {
    let query = location.search,                                    //get url parameter (search)
        pattern = /[?&]search=/,                                    //regex to check "?search-"
        button = document.getElementById('btn-clear')

    if (pattern.test(query)) {                                      //regex check url parameter "?search="
        button.style.display = "block"                              //show clear btn
    } else {
        button.style.display = "none"                               //hide clear btn
    }
}

toggleClearButton()



