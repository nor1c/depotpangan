<template>
  <div>
    <div class="d-flex flex-column-fluid">
      <!--begin::Container-->
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="row">
              <div class="col-lg-12 col-xl-12">
                <div class="
                    card card-custom
                    gutter-b
                    bg-transparent
                    shadow-none
                    border-0
                  ">
                  <div class="
                      card-header
                      align-items-center
                      border-bottom-dark
                      px-0
                    ">
                    <div class="card-title mb-0">
                      <h3 class="card-label mb-0 font-weight-bold text-body">
                        Product List
                      </h3>
                    </div>
                    <div class="icons d-flex">
                      <router-link to="/admin/add-product" class="btn ml-2 p-0 kt_notes_panel_toggle"
                        data-toggle="tooltip" title="" data-placement="right" data-original-title="Check out more demos"
                        v-if="$parent.permissions.includes('product-manage')">
                        <span class="
                            bg-secondary
                            h-30px
                            font-size-h5
                            w-30px
                            d-flex
                            align-items-center
                            justify-content-center
                            rounded-circle
                            shadow-sm
                          ">
                          <svg width="25px" height="25px" viewBox="0 0 16 16" class="bi bi-plus white"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                              d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z">
                            </path>
                          </svg>
                        </span>
                      </router-link>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card card-custom gutter-b bg-white border-0">
                  <div class="card-body">
                    <div>
                      <div class="table-responsive" id="printableTable">
                        <div id="product_wrapper" class="dataTables_wrapper no-footer">
                          <div class="dataTables_length" id="product_length">
                            <label>Show
                              <select name="product_length" class="" v-model="limit" v-on:change="fetchproducts()">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="500">500</option>
                                <option value="1000">1000</option>
                              </select>
                              entries</label>
                          </div>

                          <div id="product_filter" class="dataTables_filter">
                            <label>Search:<input type="text" class="" placeholder="" v-model="searchParameter"
                                @keyup="fetchproducts()" /></label>
                            <button v-if="this.searchParameter != ''" @click="clearSearch">clear</button>

                          </div>
                          <table id="product" class="display dataTable no-footer" product="grid">
                            <thead class="text-body">
                              <tr product="row">
                                <th class="sorting" tabindex="0" rowspan="1" colspan="1" aria-sort="ascending"
                                  aria-label="ID: activate to sort column descending" style="width: 31.25px"
                                  @click="sorting('id')" :class="
                                    (this.$data.sortType == 'asc' ||
                                      this.$data.sortType == 'ASC') &&
                                      this.$data.sortBy == 'id'
                                      ? 'sorting_asc'
                                      : (this.$data.sortType == 'desc' ||
                                        this.$data.sortType == 'DESC') &&
                                        this.$data.sortBy == 'id'
                                        ? 'sorting_desc'
                                        : 'sorting'
                                  ">
                                  ID
                                </th>
                                <th class="sorting" tabindex="0" rowspan="1" colspan="1" aria-sort="ascending"
                                  aria-label="ID: activate to sort column descending" style="width: 31.25px"
                                  @click="sorting('title')" :class="
                                    (this.$data.sortType == 'asc' ||
                                      this.$data.sortType == 'ASC') &&
                                      this.$data.sortBy == 'title'
                                      ? 'sorting_asc'
                                      : (this.$data.sortType == 'desc' ||
                                        this.$data.sortType == 'DESC') &&
                                        this.$data.sortBy == 'title'
                                        ? 'sorting_desc'
                                        : 'sorting'
                                  ">
                                  Name
                                </th>
                                <th class="no-sort sorting_disabled" tabindex="0" rowspan="1" colspan="1"
                                  aria-label="product: activate to sort column ascending" style="width: 95.5288px">
                                  Product Image
                                </th>
                                <th class="sorting" tabindex="0" rowspan="1" colspan="1" aria-sort="ascending"
                                  aria-label="ID: activate to sort column descending" style="width: 31.25px"
                                  @click="sorting('category_name')" :class="
                                    (this.$data.sortType == 'asc' ||
                                      this.$data.sortType == 'ASC') &&
                                      this.$data.sortBy == 'category_name'
                                      ? 'sorting_asc'
                                      : (this.$data.sortType == 'desc' ||
                                        this.$data.sortType == 'DESC') &&
                                        this.$data.sortBy == 'category_name'
                                        ? 'sorting_desc'
                                        : 'sorting'
                                  ">
                                  Category
                                </th>
                                <th class="sorting" tabindex="0" rowspan="1" colspan="1" aria-sort="ascending"
                                  aria-label="ID: activate to sort column descending" style="width: 31.25px"
                                  @click="sorting('product_type')" :class="
                                    (this.$data.sortType == 'asc' ||
                                      this.$data.sortType == 'ASC') &&
                                      this.$data.sortBy == 'product_type'
                                      ? 'sorting_asc'
                                      : (this.$data.sortType == 'desc' ||
                                        this.$data.sortType == 'DESC') &&
                                        this.$data.sortBy == 'product_type'
                                        ? 'sorting_desc'
                                        : 'sorting'
                                  ">
                                  Type
                                </th>
                                <th class="sorting" tabindex="0" rowspan="1" colspan="1" aria-sort="ascending"
                                  aria-label="ID: activate to sort column descending" style="width: 31.25px"
                                  @click="sorting('price')" :class="
                                    (this.$data.sortType == 'asc' ||
                                      this.$data.sortType == 'ASC') &&
                                      this.$data.sortBy == 'price'
                                      ? 'sorting_asc'
                                      : (this.$data.sortType == 'desc' ||
                                        this.$data.sortType == 'DESC') &&
                                        this.$data.sortBy == 'price'
                                        ? 'sorting_desc'
                                        : 'sorting'
                                  ">
                                  Price
                                </th>

                                <th class="sorting" tabindex="0" rowspan="1" colspan="1" aria-sort="ascending"
                                  aria-label="ID: activate to sort column descending" style="width: 31.25px"
                                  @click="sorting('discount_price')" :class="
                                    (this.$data.sortType == 'asc' ||
                                      this.$data.sortType == 'ASC') &&
                                      this.$data.sortBy == 'price'
                                      ? 'sorting_asc'
                                      : (this.$data.sortType == 'desc' ||
                                        this.$data.sortType == 'DESC') &&
                                        this.$data.sortBy == 'price'
                                        ? 'sorting_desc'
                                        : 'sorting'
                                  ">
                                  Discount Price
                                </th>

                                <th v-if="roleId == 1 || roleId == 2" class="sorting" tabindex="0" rowspan="1"
                                  colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending"
                                  style="width: 31.25px" @click="sorting('stock')" :class="
                                    (this.$data.sortType == 'asc' ||
                                      this.$data.sortType == 'ASC') &&
                                      this.$data.sortBy == 'stock'
                                      ? 'sorting_asc'
                                      : (this.$data.sortType == 'desc' ||
                                        this.$data.sortType == 'DESC') &&
                                        this.$data.sortBy == 'stock'
                                        ? 'sorting_desc'
                                        : 'sorting'
                                  ">
                                  Stok Konsolidasi
                                </th>

                                <th v-if="roleId != 1 && roleId != 2" class="sorting" tabindex="0" rowspan="1"
                                  colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending"
                                  style="width: 31.25px" @click="sorting('stock')" :class="
                                    (this.$data.sortType == 'asc' ||
                                      this.$data.sortType == 'ASC') &&
                                      this.$data.sortBy == 'stock'
                                      ? 'sorting_asc'
                                      : (this.$data.sortType == 'desc' ||
                                        this.$data.sortType == 'DESC') &&
                                        this.$data.sortBy == 'stock'
                                        ? 'sorting_desc'
                                        : 'sorting'
                                  ">
                                  Stok Gudang
                                </th>

                                <th class="sorting" tabindex="0" rowspan="1" colspan="1" aria-sort="ascending"
                                  aria-label="ID: activate to sort column descending" style="width: 31.25px"
                                  @click="sorting('is_b2b')" :class="
                                    (this.$data.sortType == 'asc' ||
                                      this.$data.sortType == 'ASC') &&
                                      this.$data.sortBy == 'is_b2b'
                                      ? 'sorting_asc'
                                      : (this.$data.sortType == 'desc' ||
                                        this.$data.sortType == 'DESC') &&
                                        this.$data.sortBy == 'is_b2b'
                                        ? 'sorting_desc'
                                        : 'sorting'
                                  ">
                                  Is B2B
                                </th>
                                <th class="sorting" tabindex="0" rowspan="1" colspan="1" aria-sort="ascending"
                                  aria-label="ID: activate to sort column descending" style="width: 31.25px"
                                  @click="sorting('product_status')" :class="
                                    (this.$data.sortType == 'asc' ||
                                      this.$data.sortType == 'ASC') &&
                                      this.$data.sortBy == 'product_status'
                                      ? 'sorting_asc'
                                      : (this.$data.sortType == 'desc' ||
                                        this.$data.sortType == 'DESC') &&
                                        this.$data.sortBy == 'product_status'
                                        ? 'sorting_desc'
                                        : 'sorting'
                                  ">
                                  Status
                                </th>
                                <th v-if="
                                  $parent.permissions.includes(
                                    'product-manage'
                                  )
                                " class="no-sort sorting_disabled" rowspan="1" colspan="1" aria-label="Action"
                                  style="width: 53.1891px">
                                  Action
                                </th>
                              </tr>
                            </thead>
                            <tbody class="kt-table-tbody text-dark">
                              <tr class="kt-table-row kt-table-row-level-0 odd" product="row"
                                v-for="product in products" v-bind:key="product.id">
                                <td class="sorting_1">
                                  {{ product.product_id }}
                                </td>
                                <td>
                                  {{
                                      product.detail == null
                                        ? ""
                                        : product.detail[0]
                                          ? product.detail[0].title
                                          : ""
                                  }}
                                </td>
                                <td>
                                  <img style="height: 80px" :src="
                                    +product.product_gallary != null
                                      ? '/gallary/' +
                                      product.product_gallary.gallary_name
                                      : ''
                                  " />
                                </td>
                                <td>
                                  {{
                                      product.category == null
                                        ? ""
                                        : !product.category[0].category_detail
                                          ? ""
                                          : product.category[0].category_detail
                                            .detail[0]
                                            ? product.category[0].category_detail
                                              .detail[0].name
                                            : ""
                                  }}
                                </td>
                                <td>
                                  {{ product.product_type }}
                                </td>
                                <td>
                                  {{ currencyFormat(product.product_price) }}
                                </td>
                                <td>
                                  {{ currencyFormat(product.product_discount_price) }}
                                </td>
                                <td v-if="roleId == 1 || roleId == 2">
                                  {{ product.consolidation_stock ? product.consolidation_stock.current_stock : 0 }}
                                </td>
                                <td v-if="roleId != 1 && roleId != 2">
                                  {{ product.warehouse_stock ? product.warehouse_stock.current_stock : 0 }}
                                </td>
                                <td>
                                  <span class="svg-icon nav-icon">
                                    <i v-if="product.is_b2c" class="fas fa-circle-xmark font-size-h4"
                                      style="color:red"></i>
                                    <i v-else class="fas fa-circle-check font-size-h4" style="color:green"></i>
                                  </span>
                                </td>
                                <td>
                                  {{ product.product_status }}
                                </td>

                                <td v-if="
                                  $parent.permissions.includes(
                                    'product-manage'
                                  )
                                ">
                                  <router-link :to="{
                                    path:
                                      '/admin/product/' + product.product_id,
                                  }" class="click-edit" id="click-edit1" data-toggle="tooltip" title=""
                                    data-placement="right" data-original-title="Check out more demos"
                                    @click="editproduct(product)"><i class="fa fa-edit"></i></router-link>
                                  <a class="" href="#" @click="deleteproduct(product.product_id)"><i
                                      class="fa fa-trash"></i></a>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <ul class="pagination pagination-sm m-0 float-right">
                            <li v-bind:class="[
                              { disabled: !pagination.prev_page_url },
                            ]">
                              <a class="page-link" href="#"
                                @click="fetchproducts(pagination.prev_page_url)">Previous</a>
                            </li>

                            <li class="disabled">
                              <a class="page-link text-dark" href="#">Page {{ pagination.current_page }} of
                                {{ pagination.last_page }}</a>
                            </li>

                            <li v-bind:class="[
                              { disabled: !pagination.next_page_url },
                            ]" class="page-item">
                              <a class="page-link" href="#" @click="fetchproducts(pagination.next_page_url)">Next</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="offcanvas offcanvas-right kt-color-panel p-5 kt_notes_panel" v-if="display_form"
      :class="display_form ? 'offcanvas-on' : ''">
      <div class="
          offcanvas-header
          d-flex
          align-items-center
          justify-content-between
          pb-3
        ">
        <h4 class="font-size-h4 font-weight-bold m-0">Add product</h4>
        <a href="#" class="
            btn btn-sm btn-icon btn-light btn-hover-primary
            kt_notes_panel_close
          " v-on:click="display_form = 0">
          <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z">
            </path>
          </svg>
        </a>
      </div>
      <form id="myform">
        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label class="text-dark">Name </label>
              <input type="text" name="text" v-model="product.name" class="form-control" />
              <small class="form-text text-danger" v-if="errors.has('name')" v-text="errors.get('name')"></small>
            </div>
            <div class="form-group">
              <label class="text-dark">Direction </label>
              <select v-model="product.direction">
                <option value="ltr">LTR</option>
                <option value="rtl">RTL</option>
              </select>
              <small class="form-text text-danger" v-if="errors.has('direction')"
                v-text="errors.get('direction')"></small>
            </div>
            <div class="form-group">
              <label class="text-dark">Code </label>
              <input type="text" name="text" v-model="product.code" class="form-control" />
              <small class="form-text text-danger" v-if="errors.has('code')" v-text="errors.get('code')"></small>
            </div>
            <div class="form-group">
              <label class="text-dark">Directory </label>
              <input type="text" name="text" v-model="product.directory" class="form-control" />
              <small class="form-text text-danger" v-if="errors.has('directory')"
                v-text="errors.get('directory')"></small>
            </div>
            <div class="form-group">
              <input type="checkbox" name="text" v-model="product.is_default" id="is_default"
                class="form-check-input" />
              <label class="text-dark" for="is_default">Set as default </label>
              <small class="form-text text-danger" v-if="errors.has('is_default')"
                v-text="errors.get('is_default')"></small>
            </div>
          </div>
        </div>
        <button type="button" @click="addUpdateproduct()" class="btn btn-primary">
          Submit
        </button>
      </form>
    </div>
  </div>
</template>

<script>
import ErrorHandling from "./../../ErrorHandling";
export default {
  data() {
    return {
      roleId: 0,
      display_form: 0,
      products: [],
      searchParameter: "",
      sortBy: "id",
      sortType: "DESC",
      limit: 10,
      error_message: "",
      edit: false,
      actions: false,
      pagination: {},
      request_method: "",
      is_default: "0",
      token: [],
      currency: [],
      errors: new ErrorHandling(),
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    };
  },

  methods: {
    fetchCurrency() {
      this.$parent.loading = true;
      var token = localStorage.getItem("token");
      const config = {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      };
      var responseData = {};

      axios
        .get("/api/admin/currency?is_default=1", config)
        .then((res) => {
          if (res.data.status == "Success") {
            this.currency = res.data.data;
          }
        })
        .finally(() => (this.$parent.loading = false));
    },
    fetchproducts(page_url) {
      this.$parent.loading = true;
      let vm = this;
      page_url = page_url || "/api/admin/product";
      var arr = page_url.split("?");

      if (arr.length > 1) {
        page_url += "&limit=" + this.limit;
      } else {
        page_url += "?limit=" + this.limit;
      }
      if (this.searchParameter != null) {
        page_url += "&searchParameter=" + this.searchParameter;
      }

      page_url += "&sortBy=" + this.sortBy + "&sortType=" + this.sortType;
      page_url += "&getDetail=1&getCategory=1";

      var responseData = {};

      axios
        .get(page_url, this.token)
        .then((res) => {
          this.products = res.data.data;
          vm.makePagination(res.data.meta, res.data.links);
        })
        .finally(() => (this.$parent.loading = false));
    },

    makePagination(meta, links) {
      let pagination = {
        current_page: meta.current_page,
        last_page: meta.last_page,
        next_page_url: links.next,
        prev_page_url: links.prev,
      };

      this.pagination = pagination;
    },
    sorting(sortBy) {
      this.sortBy = sortBy;
      this.sortType =
        this.sortType == "asc" || this.sortType == "ASC"
          ? (this.sortType = "desc")
          : (this.sortType = "asc");
      this.fetchproducts();
    },
    getCurrencyTitle() {
      return this.currency == null ? "" : "(" + this.currency.title + ")";
    },
    deleteproduct(id) {
      if (confirm("Are You Sure?")) {
        this.$parent.loading = true;
        axios
          .delete(`/api/admin/product/${id}`, this.token)
          .then((res) => {
            if (res.data.status == "Success") {
              this.$toaster.success(res.data.message);
              this.fetchproducts();
            }
          })
          .catch((error) => {
            if (error.response.status == 422) {
              if (error.response.data.status == 'Error') {
                this.$toaster.error(error.response.data.message)
              }
            }
          })
          .finally(() => (this.$parent.loading = false));
      }
    },
    clearSearch() {
      this.searchParameter = "",
        this.fetchproducts();
    }
  },
  mounted() {
    var token = localStorage.getItem("token");
    this.roleId = localStorage.getItem('role_id');
    this.token = {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    };
    this.fetchCurrency();
    this.fetchproducts();
  },
  props: ["loading"],
};
</script>
