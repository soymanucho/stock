@extends('layouts.datatable')

@section('header')

  <th>Customer</th>
  <th>Registered</th>
  <th>Email</th>
  <th>Payment method</th>
  <th>Orders history</th>
  <th>Value</th>
  <th>Actions</th>


@endsection

@section('body')

    <tr>
      <td>
        <div class="media">
          <div class="mr-3">
            <a href="">
              <img src="{{ asset('/img/avatar.svg') }}" width="40" height="40" class="rounded-circle" alt="">
            </a>
          </div>

          <div class="media-body align-self-center">
            <a href="" class="font-weight-semibold">James Alexander</a>
            <div class="text-muted font-size-sm">
              Latest order: 2016.12.30
            </div>
          </div>
        </div>
      </td>
      <td>July 12, 2016</td>
      <td><a href="#">james@interface.club</a></td>
      <td>MasterCard</td>
      <td>
        <ul class="list-unstyled mb-0">
          <li>
            <i class="icon-infinite font-size-base text-warning mr-2"></i>
            Pending:
            <a href="#">25 orders</a>
          </li>

          <li>
            <i class="icon-checkmark3 font-size-base text-success mr-2"></i>
            Processed:
            <a href="#">34 orders</a>
          </li>
        </ul>
      </td>
      <td>
        <h6 class="mb-0 font-weight-semibold">&euro; 322.00</h6>
      </td>
      <td class="text-right">
        <div class="list-icons">
          <div class="list-icons-item dropdown">
            <a href="#" class="list-icons-item" data-toggle="dropdown">
              <i class="icon-menu7"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
              <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Invoices</a>
              <a href="#" class="dropdown-item"><i class="icon-cube2"></i> Shipping details</a>
              <a href="#" class="dropdown-item"><i class="icon-credit-card"></i> Billing details</a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
            </div>
          </div>
        </div>
      </td>

    </tr>

@endsection
