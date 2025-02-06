<?php

namespace App\Livewire;

use Livewire\Component;

class InvoiceDashboard extends Component
{
    public $activeTab = 'all';
    public $invoices = [];
    public $openDropdown = null;

    public function mount()
    {
        $this->invoices = [
            ['id' => 1, 'amount' => '$200', 'invoice_number' => 'INV001', 'email' => 'customer1@example.com', 'status' => 'Paid', 'date' => 'Apr 29, 6:37 PM'],
            ['id' => 2, 'amount' => '$150', 'invoice_number' => 'INV002', 'email' => 'customer2@example.com', 'status' => 'Outstanding', 'date' => 'Apr 28, 4:20 PM'],
            ['id' => 3, 'amount' => '$300', 'invoice_number' => 'INV003', 'email' => 'customer3@example.com', 'status' => 'Paid due', 'date' => 'Apr 27, 10:10 AM'],
            ['id' => 4, 'amount' => '$120', 'invoice_number' => 'INV004', 'email' => 'customer4@example.com', 'status' => 'Draft', 'date' => 'Apr 29, 1:05 PM'],
            ['id' => 5, 'amount' => '$250', 'invoice_number' => 'INV005', 'email' => 'customer5@example.com', 'status' => 'Paid', 'date' => 'Apr 30, 9:45 AM'],
            ['id' => 6, 'amount' => '$400', 'invoice_number' => 'INV006', 'email' => 'customer6@example.com', 'status' => 'Outstanding', 'date' => 'Apr 25, 5:15 PM'],
            ['id' => 7, 'amount' => '$350', 'invoice_number' => 'INV007', 'email' => 'customer7@example.com', 'status' => 'Paid due', 'date' => 'Apr 26, 8:22 AM'],
            ['id' => 8, 'amount' => '$600', 'invoice_number' => 'INV008', 'email' => 'customer8@example.com', 'status' => 'Paid', 'date' => 'Apr 29, 7:30 PM'],
            ['id' => 9, 'amount' => '$450', 'invoice_number' => 'INV009', 'email' => 'customer9@example.com', 'status' => 'Draft', 'date' => 'Apr 28, 11:00 AM'],
            ['id' => 10, 'amount' => '$150', 'invoice_number' => 'INV010', 'email' => 'customer10@example.com', 'status' => 'Paid due', 'date' => 'Apr 27, 6:05 PM'],
        ];
    }


    public function setTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function toggleDropdown($id)
    {
        $this->openDropdown = ($this->openDropdown === $id) ? null : $id;
    }

    public function render()
    {
        $filteredInvoices = ($this->activeTab === 'all')
            ? $this->invoices
            : array_filter($this->invoices, fn($invoice) => strtolower($invoice['status']) === strtolower($this->activeTab));

        return view('livewire.invoice-dashboard', [
            'filteredInvoices' => $filteredInvoices
        ]);
    }
}
