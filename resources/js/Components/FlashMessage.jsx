import { CheckCircleIcon, XCircleIcon, ExclamationTriangleIcon, InformationCircleIcon, XMarkIcon } from '@heroicons/react/24/outline';
import { useMemo } from 'react';

export default function FlashMessage({
    variant = 'success',
    title = '',
    content = '',
    show = true,
    onDismiss = null,
}) {
    const baseClasses = 'flex p-4 rounded-md space-x-3 transition-opacity duration-300';

    const variantClasses = useMemo(() => {
        return {
            success: 'bg-green-100 text-green-900',
            danger: 'bg-red-100 text-red-900',
            warning: 'bg-yellow-100 text-yellow-900',
            info: 'bg-blue-100 text-blue-900',
        }[variant] || '';
    }, [variant]);

    const variantButtonClasses = useMemo(() => {
        return {
            success: 'text-green-900/70 hover:text-green-900 hover:bg-green-200 p-0.5 rounded-md',
            danger: 'text-red-900/70 hover:text-red-900 hover:bg-red-200 p-0.5 rounded-md',
            warning: 'text-yellow-900/70 hover:text-yellow-900 hover:bg-yellow-200 p-0.5 rounded-md',
            info: 'text-blue-900/70 hover:text-blue-900 hover:bg-blue-200 p-0.5 rounded-md',
        }[variant] || '';
    }, [variant]);

    const IconComponent = useMemo(() => {
        return {
            success: CheckCircleIcon,
            danger: XCircleIcon,
            warning: ExclamationTriangleIcon,
            info: InformationCircleIcon,
        }[variant] || InformationCircleIcon;
    }, [variant]);

    if (!show) return null;

    return (
        <div className={`${baseClasses} ${variantClasses}`}>
            <div className="shrink-0">
                <IconComponent className="w-6 h-6" />
            </div>

            <div className="flex-1 space-y-2">
                {title && <h2 className="font-medium">{title}</h2>}
                {content && <div className="text-sm">{content}</div>}
            </div>

            {onDismiss && (
                <div className="shrink-0">
                    <button onClick={onDismiss} className={variantButtonClasses}>
                        <XMarkIcon  className="w-6 h-6" />
                    </button>
                </div>
            )}
        </div>
    );
}
