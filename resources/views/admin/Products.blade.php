

@extends('layout.layout')
@section('content')
<div class="content">
        <div class="row gy-3 mb-6 justify-content-between">
          <div class="col-md-9 col-auto">
            <h2 class="mb-2 text-body-emphasis">Products</h2>
            <p class="text-muted mt-2">This section provides an overview of your Products.</p>
          </div>
          <div class="col-md-3 col-auto">
                {{-- <button class="btn btn-outline-primary w-100" onclick="window.print()">
                    <i class="fas fa-print"></i> Print
                </button> --}}
                {{-- <a href="/admin/print/companies" target="_blank" class="btn btn-outline-primary w-100"><i class="fas fa-print"></i> Print</a> --}}
            </div>
          </div>
        
        <div class="row mb-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
          <div class="col-12">
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addClientModal">
                            <i class="uil uil-plus"></i> Add Products
                        </button>

                        <div class="modal fade" id="addClientModal" tabindex="-1" aria-labelledby="clientCreateModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addVentureModalLabel">Add Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {{-- <div class="mb-3">
                                    <label for="ventureName" class="form-label">Company Venture</label>
                                    <select name="company_venture_id" id="ventureName" class="form-control @error('company_venture_id') is-invalid @enderror" required>
                                        <option value="">Select a company venture</option>
                                        @foreach ($companyVentures as $venture)
                                            <option value="{{ $venture->id }}">{{ $venture->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('company_venture_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div> --}}
                                <div class="mb-3">
                                    <label for="ventureDescription" class="form-label">Product Name</label>
                                    <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="ventureName" name="product_name" required>
                                    @error('product_name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="ventureDescription" class="form-label">Product Price</label>
                                    <input type="number" class="form-control @error('product_price') is-invalid @enderror" id="ventureName" name="product_price" required>
                                    @error('product_price') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="ventureDescription" class="form-label">Product Description</label>
                                    <textarea class="form-control @error('product_description') is-invalid @enderror" id="ventureDescription" name="product_description" rows="3" required></textarea>
                                    @error('product_description') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="ventureImage" class="form-label">Image</label>
                                    <input type="file" class="form-control @error('product_image') is-invalid @enderror" id="ventureImage" name="product_image" accept="image/*">
                                    @error('product_image') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add Product</button>
                            </div>
                        </div>
                                </form>
                            </div>
                        </div>
            <div class="card shadow-sm">
              <div class="card-header">
                <h5 class="mb-0">Products</h5>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive scrollbar mx-n1 px-1">
                  <table class="table table-sm fs-9 mb-0">
                    <thead class="table-light">
                            <tr>
                                <th scope="sort align-middle ps-8">#</th>
                                <th scope="sort align-middle">Image</th>
                                <th scope="sort align-middle">Name</th>
                                <th scope="sort align-middle">Description</th>
                                <th scope="sort align-middle">Price</th>
                                <th scope="sort align-middle">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td class="align-middle ps-8">{{ $product->id }}</td>
                                    <td class="align-middle">
                                            <img src="{{ asset('storage/product_images/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid" style="max-height: 100px;">
                                    </td>
                                    <td class="align-middle">
                                        @if($product)
                                            {{ $product->name }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                            {{ $product->description }}
                                    </td>

                                    <td class="align-middle">
                                            {{ $product->price }}
                                    </td>
                                    <td class="align-middle">
                                    </td>
                                </tr>
                                {{-- <div class="modal fade" id="approveModal{{ $venture->id }}" tabindex="-1" aria-labelledby="approveModalLabel{{ $venture->id }}" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <form method="POST" action="{{ route('admin.company.venture.update', $venture->id) }}">
                                                                @csrf
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="approveModalLabel{{ $venture->id }}">Update Venture</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="mb-3">
                                                                            <label for="freeStatus{{ $venture->id }}" class="form-label">Status</label>
                                                                            <select class="form-select" id="freeStatus{{ $venture->id }}" name="free">
                                                                                <option value="1" {{ $venture->free ? 'selected' : '' }}>Free</option>
                                                                                <option value="0" {{ !$venture->free ? 'selected' : '' }}>Paid</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div> --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
              </div>
              <div class="card-footer">
                {{ $products->links('pagination::bootstrap-5') }}
              </div>
            </div>
          </div>
        </div>
        @include('layout.footer')
        </div>
        
@endsection