<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserManagementResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Override;

class UserManagementResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'fas-users';

    protected static ?string $modelLabel = 'Pengguna';
    protected static ?string $pluralModelLabel = 'Daftar Pengguna';
    protected static ?string $navigartionLabel = 'Pengguna';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->required()
                    ->placeholder("Nama"),
                TextInput::make('email')
                    ->required()
                    ->email()
                    ->placeholder("Email"),
                TextInput::make('no_telpon')
                    ->label('No Handphone')
                    ->placeholder("No Handphone"),
                TextInput::make('alamat')
                    ->required()
                    ->placeholder('Alamat'),
                Select::make('role_id')
                    ->relationship('roles', 'nama_role')
                    ->label('Role')
                    ->required(),
                TextInput::make('password')
                    ->password()
                    ->confirmed()
                    ->revealable()
                    ->dehydrateStateUsing(fn($state)  => $state != "" ?Hash::make($state) : Hash::make("password"))
                    ->placeholder('Password')
                    ->default('password'),
                TextInput::make('password_confirmation')
                    ->label("Konfirmasi Password")
                    ->password()
                    ->revealable()
                    ->dehydrated(false)
                    ->placeholder('Konfirmasi Password')
                    ->default('password'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("No")
                        ->rowIndex(),
                TextColumn::make("nama")
                        ->searchable(),
                TextColumn::make("no_telpon")
                        ->label("No Handphone")
                        ->searchable(),
                TextColumn::make("email")
                        ->searchable(),
                TextColumn::make("roles.nama_role")
                        ->label('Role')
                        ->badge()
                        ->color(fn(string $state): string => match($state){
                            'Super Admin' => 'info',
                            "Admin" => 'primary',
                            'Teknisi' => 'success'
                        })
                        ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->actionsColumnLabel("Aksi")
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUserManagement::route('/'),
            'create' => Pages\CreateUserManagement::route('/create'),
            'edit' => Pages\EditUserManagement::route('/{record}/edit'),
        ];
    }
}
