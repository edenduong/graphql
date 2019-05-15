{
  products(
    search: "Yoga pants"
    pageSize: 10
  )
  {
    total_count
    items {
      name
      sku
      price {
        regularPrice {
          amount {
            value
            currency
          }
        }
      }
    }
    page_info {
      page_size
      current_page
    }
  }
}

{
  products(search: "Yoga pants", pageSize: 2) {
    items {
      name
      sku
    }
  }

  cmsPage(id: 2) {
    url_key
    title
  }

}
