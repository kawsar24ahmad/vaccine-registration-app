<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use App\Models\VaccineCenter;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('email')->required()->unique()->visibleOn('create'),
                TextInput::make('nid')->required(),
                TextInput::make('phone_number')->required(),
                Select::make('vaccine_center_id')->options(VaccineCenter::all()->pluck('center_name', 'id'))
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('email'),
                TextColumn::make('nid'),
                TextColumn::make('phone_number'),
                TextColumn::make('vaccine_center.center_name'),
                TextColumn::make('status'),
                TextColumn::make('schedule_date'),
            ])
            ->filters([
                // Filter::make('scheduled')->query(
                //     function ($query)  {
                //         return    $query->where('status', 'Scheduled');
                //     }
                // ),
                // Filter::make('Not_Scheduled')->query(
                //     function ($query)  {
                //         return    $query->where('status', 'Not_Scheduled');
                //     }
                // ),
                // Filter::make('Vaccinated')->query(
                //     function ($query)  {
                //         return    $query->where('status', 'Vaccinated');
                //     }
                // ),
                SelectFilter::make('status')
                ->label('Status')
                ->options([
                    'Scheduled' => 'Scheduled',
                    'Not_Scheduled' => 'Not Scheduled',
                    'Vaccinated' => 'Vaccinated',
                ]),


                SelectFilter::make('vaccine_center_id')
                ->label('Vaccine Center')
                ->options(VaccineCenter::all()->pluck('center_name', 'id'))
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
