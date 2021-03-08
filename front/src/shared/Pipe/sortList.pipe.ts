import { Pipe, PipeTransform } from '@angular/core';
@Pipe({
    name: 'sortList'
})
export class SortListPipe implements PipeTransform {
    transform(value: any, args?: any): any {
        if (typeof args[0] === 'undefined') {
            return value;
        }
        const direction = args[0][0];
        const column = args.replace('-', '');
        value.sort((a: any, b: any) => {
            const left = Number(new Date(a[column]));
            const right = Number(new Date(b[column]));
            return (direction === '-') ? right - left : left - right;
        });
        return value;
    }
}
